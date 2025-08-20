<?php
namespace App\Http\Controllers;
use App\Models\Sale;

class TrashController extends Controller
{
    public function index()
    {
        $sales = Sale::onlyTrashed()->with(['customer', 'saleItems.product'])->paginate(10);
        return view('sales.trash', compact('sales'));
    }

    public function restore($id)
    {
        Sale::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Sale restored successfully');
    }
}