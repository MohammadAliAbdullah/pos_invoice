@extends('layouts.app')

@section('content')
<div class="p-5 bg-white">
    <h1 class="text-3xl font-semibold mb-4">Sale Details</h1>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Customer</h2>
        <p>{{ $sale->customer->name }}</p>
        <p>Email: {{ $sale->customer->email ?? 'N/A' }}</p>
        <p>Phone: {{ $sale->customer->phone ?? 'N/A' }}</p>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Sale Info</h2>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($sale->sale_date)->format('Y-m-d') }}</p>
        <p><strong>Total Amount:</strong> ${{ number_format($sale->total_amount, 2) }}</p>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Items</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Product</th>
                    <th class="px-4 py-2 text-right text-sm font-medium text-gray-700">Quantity</th>
                    <th class="px-4 py-2 text-right text-sm font-medium text-gray-700">Price</th>
                    <th class="px-4 py-2 text-right text-sm font-medium text-gray-700">Discount</th>
                    <th class="px-4 py-2 text-right text-sm font-medium text-gray-700">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->items as $item)
                <tr class="border-b">
                    <td class="px-4 py-2 text-sm">{{ $item->product->name }}</td>
                    <td class="px-4 py-2 text-sm text-right">{{ $item->quantity }}</td>
                    <td class="px-4 py-2 text-sm text-right">${{ number_format($item->price, 2) }}</td>
                    <td class="px-4 py-2 text-sm text-right">${{ number_format($item->discount, 2) }}</td>
                    <td class="px-4 py-2 text-sm text-right">${{ number_format(($item->price * $item->quantity) - $item->discount, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($sale->notes->count())
    <div>
        <h2 class="text-xl font-semibold mb-2">Notes</h2>
        <ul class="list-disc pl-5 space-y-1">
            @foreach($sale->notes as $note)
                <li class="text-gray-700">{{ $note->content }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="mt-6">
        <a href="{{ route('sales.index') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Back to Sales List
        </a>
    </div>
</div>
@endsection
