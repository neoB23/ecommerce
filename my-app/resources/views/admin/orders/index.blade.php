@vite('resources/css/app.css')
@extends('admin.layout') {{-- Assumes 'admin.layout' contains the professional sidebar and header --}}

@section('title', 'Orders Management')

@section('content')

<div class="max-w-full">
    {{-- Main Content Card --}}
    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
        
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 border-b pb-3">Order List</h2>

        {{-- Table Container for Scrolling --}}
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                
                {{-- Table Header --}}
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Customer
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>

                {{-- Table Body --}}
                <tbody class="bg-white divide-y divide-gray-200">
@foreach($orders as $order)
<tr>
    {{-- Product Name --}}
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
        {{ $order->product->title ?? 'N/A (Product Removed)' }}
    </td>

    {{-- Customer Name --}}
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
        {{ $order->user->name ?? 'N/A (User Removed)' }}
    </td>

    {{-- Quantity --}}
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
        {{ $order->quantity ?? 1 }}
    </td>

    {{-- Status --}}
    <td class="px-6 py-4 whitespace-nowrap">
        @php
            $badgeColor = match($order->status) {
                'Delivered' => 'bg-green-100 text-green-800',
                'Pending' => 'bg-yellow-100 text-yellow-800',
                'Cancelled' => 'bg-red-100 text-red-800',
                default => 'bg-gray-100 text-gray-800',
            };
        @endphp
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $badgeColor }}">
            {{ $order->status }}
        </span>
    </td>

    {{-- Actions: Update Status --}}
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
        <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="flex items-center space-x-2">
            @csrf
            @method('PATCH')
            <select name="status" class="border p-2 text-sm rounded-lg">
                <option value="Pending" {{ $order->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Delivered" {{ $order->status === 'Delivered' ? 'selected' : '' }}>Delivered</option>
            </select>
            <button type="submit" class="px-3 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-700">
                Update
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>

            </table>
        </div>

        {{-- Optional: Pagination Links --}}
        {{-- <div class="mt-4">
            {{ $orders->links() }}
        </div> --}}

    </div>
</div>

@endsection