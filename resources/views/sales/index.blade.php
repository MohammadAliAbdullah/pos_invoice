@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow rounded-lg mt-8">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 sm:mb-0">Sales List</h2>
        <div class="flex space-x-3">
            <a href="{{ route('sales.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                New Sale
            </a>
            <a href="{{ route('trash.index') }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                View Trash
            </a>
        </div>
    </div>

    <form method="GET" class="mb-6">
        <div class="grid grid-cols-1 sm:grid-cols-5 gap-4">
            <input
                type="text"
                name="customer_name"
                value="{{ request('customer_name') }}"
                placeholder="Customer Name"
                class="border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            />
            <input
                type="text"
                name="product_name"
                value="{{ request('product_name') }}"
                placeholder="Product Name"
                class="border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            />
            <input
                type="date"
                name="date_from"
                value="{{ request('date_from') }}"
                class="border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            />
            <input
                type="date"
                name="date_to"
                value="{{ request('date_to') }}"
                class="border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            />
            <button
                type="submit"
                class="bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-700 transition"
            >
                Filter
            </button>
        </div>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($sales as $sale)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $sale->customer->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ \Carbon\Carbon::parse($sale->sale_date)->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">{{ number_format($sale->total_amount, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                        <a href="{{ route('sales.show', $sale->id) }}"
                        class="inline-flex items-center px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
                        >
                            Invoice
                        </a>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="inline-flex items-center px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition"
                                onclick="return confirm('Are you sure you want to delete this sale?');"
                            >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-between items-center mt-4">
        <div class="text-gray-700 font-semibold">Total: {{ number_format($total, 2) }}</div>
        <div>
            {{ $sales->links() }}
        </div>
    </div>
</div>
@endsection
