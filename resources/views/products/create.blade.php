@extends('layouts.app')

@section('content')
<div class="p-4 bg-white">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Create Product</h2>

    <form action="{{ route('products.store') }}" method="POST" novalidate>
        @csrf

        <div class="mb-5">
            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
            <input 
                type="text" 
                name="name" 
                id="name"
                value="{{ old('name', $product->name ?? '') }}" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                required
            >
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="price" class="block text-gray-700 font-medium mb-2">Price</label>
            <input 
                type="number" 
                step="0.01" 
                name="price" 
                id="price"
                value="{{ old('price', $product->price ?? '') }}" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
            @error('price')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="note" class="block text-gray-700 font-medium mb-2">Note</label>
            <textarea 
                name="note" 
                id="note"
                rows="4" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >{{ old('note', $product->note ?? '') }}</textarea>
            @error('note')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button 
            type="submit" 
            class="pr-2 pl-2 bg-green-600 text-white py-3 rounded-md hover:bg-green-700 transition"
        >
            Save
        </button>
    </form>
</div>
@endsection
