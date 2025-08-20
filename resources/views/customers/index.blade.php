@extends('layouts.app')

@section('content')
<div class="p-4 bg-white">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Customer List</h2>
        <a href="{{ route('customers.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4"/>
            </svg>
            Add Customer
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded-md shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-md">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 text-gray-700 text-left text-sm">
                <tr>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Phone</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                @forelse($customers as $customer)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $customer->name }}</td>
                        <td class="px-4 py-3">{{ $customer->email ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $customer->phone ?? '—' }}</td>
                        <td class="px-4 py-3 flex space-x-2">
                            <a href="{{ route('customers.edit', $customer) }}" 
                               class="inline-flex items-center px-3 py-1 bg-yellow-400 text-white text-xs font-medium rounded hover:bg-yellow-500">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('customers.destroy', $customer) }}" method="POST" onsubmit="return confirm('Delete this customer?')">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600">
                                    🗑️ Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-gray-500">No customers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $customers->links('pagination::tailwind') }}
    </div>
</div>
@endsection
