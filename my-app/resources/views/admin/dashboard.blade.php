@extends('admin.layout')

@section('title', 'KickCraze Admin Dashboard')

@section('content')

<div class="space-y-8">
    
    {{-- 1. Key Metrics Cards (Enhanced UI) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        {{-- Total Orders Card (Primary Gray) --}}
        <div class="bg-white p-6 rounded-xl shadow-lg transition duration-300 hover:shadow-xl border-t-4 border-gray-900 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Total Orders</p>
                <p class="text-4xl font-extrabold text-gray-900 mt-1">1,200</p>
            </div>
            <div class="text-gray-900 bg-gray-100 p-3 rounded-full">
                <i class="fas fa-receipt fa-2x"></i>
            </div>
        </div>

        {{-- Revenue Card (Success Green) --}}
        <div class="bg-white p-6 rounded-xl shadow-lg transition duration-300 hover:shadow-xl border-t-4 border-green-600 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-green-600">Total Revenue</p>
                <p class="text-4xl font-extrabold text-gray-900 mt-1">₱45,231</p>
            </div>
            <div class="text-green-600 bg-green-50 p-3 rounded-full">
                <i class="fas fa-money-bill-wave fa-2x"></i>
            </div>
        </div>

        {{-- Pending Card (Warning Red/Orange) --}}
        <div class="bg-white p-6 rounded-xl shadow-lg transition duration-300 hover:shadow-xl border-t-4 border-red-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-red-500">Pending Orders</p>
                <p class="text-4xl font-extrabold text-gray-900 mt-1">15</p>
            </div>
            <div class="text-red-500 bg-red-50 p-3 rounded-full">
                <i class="fas fa-exclamation-circle fa-2x"></i>
            </div>
        </div>

        {{-- New Users Card (Info Blue/Gray) --}}
        <div class="bg-white p-6 rounded-xl shadow-lg transition duration-300 hover:shadow-xl border-t-4 border-blue-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-blue-500">New Customers</p>
                <p class="text-4xl font-extrabold text-gray-900 mt-1">32</p>
            </div>
            <div class="text-blue-500 bg-blue-50 p-3 rounded-full">
                <i class="fas fa-users fa-2x"></i>
            </div>
        </div>
    </div>
    
    {{-- 2. Recent Activity / Orders Table --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Recent Orders (2/3 width on LG) --}}
        <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-lg">
            <h3 class="text-xl font-semibold text-gray-800 border-b pb-3 mb-4">Recent Orders</h3>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{-- Mock Data for demonstration --}}
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#KCZ1001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">John Doe</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Processing
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">₱2,500.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 min ago</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#KCZ1000</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Jane Smith</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Completed
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">₱5,990.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1 hour ago</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#KCZ999</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Alex Lee</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Cancelled
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">₱1,250.00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">4 hours ago</td>
                        </tr>
                        {{-- Link to all orders --}}
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center">
                                <a href="{{ route('admin.orders.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">
                                    View All Orders &rarr;
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        {{-- Quick Actions (1/3 width on LG) --}}
        <div class="bg-white p-6 rounded-xl shadow-lg">
            <h3 class="text-xl font-semibold text-gray-800 border-b pb-3 mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <a href="{{ route('admin.products.create') }}" 
                   class="flex items-center justify-between p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors border border-gray-200">
                    <span class="font-medium text-gray-700">Add New Product</span>
                    <i class="fas fa-plus-circle text-gray-900"></i>
                </a>
                <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" 
                   class="flex items-center justify-between p-3 bg-red-50 hover:bg-red-100 rounded-lg transition-colors border border-red-200">
                    <span class="font-medium text-red-700">Review Pending Orders</span>
                    <i class="fas fa-clipboard-list text-red-500"></i>
                </a>
                <a href="{{ route('admin.products.index') }}" 
                   class="flex items-center justify-between p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors border border-gray-200">
                    <span class="font-medium text-gray-700">Manage Inventory</span>
                    <i class="fas fa-warehouse text-gray-900"></i>
                </a>
            </div>
        </div>
        
    </div>
</div>

@endsection