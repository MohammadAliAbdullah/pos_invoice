<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $query = Sale::query()->with(['customer', 'saleItems.product']);
        
        if ($request->customer_name) {
            $query->whereHas('customer', function ($q) use ($request) {
                $q->where('name', 'like', '%'.$request->customer_name.'%');
            });
        }
        
        if ($request->product_name) {
            $query->whereHas('saleItems.product', function ($q) use ($request) {
                $q->where('name', 'like', '%'.$request->product_name.'%');
            });
        }
        
        if ($request->date_from && $request->date_to) {
            $query->whereBetween('sale_date', [$request->date_from, $request->date_to]);
        }
        
        $sales = $query->paginate(10);
        $total = $sales->sum('total_amount');
        
        return view('sales.index', compact('sales', 'total'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('sales.create', compact('customers', 'products'));
    }

    public function store(StoreSaleRequest $request)
    {
        \DB::beginTransaction();
        try {
            $sale = Sale::create([
                'customer_id' => $request->customer_id,
                'total_amount' => $request->total_amount,
                'sale_date' => $request->sale_date
            ]);

            foreach ($request->items as $item) {
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'discount' => $item['discount'] ?? 0
                ]);
            }

            if ($request->note) {
                $sale->notes()->create(['content' => $request->note]);
            }

            \DB::commit();
            
            // return response()->json([
            //     'message' => 'Sale created successfully',
            //     'sale' => new SaleResource($sale)
            // ]);
            return redirect()->route('sales.index') // or any route name you want
                ->with('success', 'Sale created successfully');
        } catch (\Exception $e) {
           \DB::rollback();
            \Log::error('Sale creation failed: ' . $e->getMessage());

            return response()->json([
                'error' => 'Failed to create sale',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        }
    }

    public function show($id)
    {
        // Find the sale with related data or fail 404
        $sale = Sale::with(['customer', 'items.product', 'notes'])->findOrFail($id);

        // Return a view, passing the sale data
        return view('sales.show', compact('sale'));
    }

    public function getProductPrice($id)
    {
        $product = Product::findOrFail($id);
        return response()->json(['price' => $product->price]);
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);

        // If you use soft deletes:
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }

}