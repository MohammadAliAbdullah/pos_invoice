@extends('layouts.app')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="max-w-1xl sm:p-2 bg-white shadow-lg rounded-xl mt-4 sm:mt-6">
    <div class="border-b border-gray-200 pb-3 mb-5">
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Create New Sale</h2>
    </div>
    <form id="saleForm" class="space-y-5" action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
            <div class="flex-1">
                <label for="customer_id" class="block text-sm font-medium text-gray-700 mb-1">Customer</label>
                <select name="customer_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-1">
                <label for="sale_date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                <input type="date" name="sale_date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required value="{{ now()->format('Y-m-d') }}">
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border border-gray-300 rounded-md" id="sale-items-table">
                <thead class="bg-gray-100 text-sm text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border">Product</th>
                        <th class="px-4 py-2 border">Quantity</th>
                        <th class="px-4 py-2 border">Price</th>
                        <th class="px-4 py-2 border">Discount</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody id="items">
                    <tr class="item-row" data-index="0">
                        <td class="border px-2 py-1">
                            <select name="items[0][product_id]" class="product-select w-full px-2 py-1 border border-gray-300 rounded-md" required>
                                <option value="">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" price="{{ $product->price }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="border px-2 py-1">
                            <input type="number" name="items[0][quantity]" class="quantity w-full px-2 py-1 border border-gray-300 rounded-md" required min="1" value="1" placeholder="Quantity">
                        </td>
                        <td class="border px-2 py-1">
                            <input type="number" name="items[0][price]" class="price w-full px-2 py-1 border border-gray-300 rounded-md bg-gray-100" readonly>
                        </td>
                        <td class="border px-2 py-1">
                            <input type="number" name="items[0][discount]" class="discount w-full px-2 py-1 border border-gray-300 rounded-md" value="0" placeholder="Discount">
                        </td>
                        <td class="border px-2 py-1 text-center">
                            <button type="button" class="remove-item px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button type="button" id="addItem" class="mt-3 px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition duration-150">Add Item</button>

        <div>
            <label for="total_amount" class="block text-sm font-medium text-gray-700 mb-1">Total Amount</label>
            <input type="number" name="total_amount" id="total_amount" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100" readonly>
        </div>
        <div>
            <label for="note" class="block text-sm font-medium text-gray-700 mb-1">Note</label>
            <textarea name="note" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" rows="4"></textarea>
        </div>
        <button type="submit" class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-150">Save Sale</button>
    </form>
    <div id="alert" class="mt-4 text-sm text-red-600 hidden"></div>
</div>
 
<script>
</script>

@endsection