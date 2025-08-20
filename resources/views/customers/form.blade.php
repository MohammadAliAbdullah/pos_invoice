@extends('layouts.app')

@section('content')
<div class="p-4 bg-white">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">
        {{ isset($customer) ? 'Edit Customer' : 'Add Customer' }}
    </h2>

    <form action="{{ isset($customer) ? route('customers.update', $customer->id) : route('customers.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @if(isset($customer))
            @method('PUT')
        @endif

        {{-- Name --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" id="name" name="name"
                value="{{ old('name', $customer->name ?? '') }}"
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 @error('name') border-red-500 @enderror">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" name="email"
                value="{{ old('email', $customer->email ?? '') }}"
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 @error('email') border-red-500 @enderror">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Phone --}}
        <div class="mb-6">
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
            <input type="text" id="phone" name="phone"
                value="{{ old('phone', $customer->phone ?? '') }}"
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 @error('phone') border-red-500 @enderror">
            @error('phone')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex items-center justify-between">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
                {{ isset($customer) ? 'Update' : 'Save' }}
            </button>
            <a href="{{ route('customers.index') }}"
                class="text-gray-600 hover:text-blue-600 transition text-sm">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
