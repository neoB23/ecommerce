@vite('resources/css/app.css')

@include('components.navbar')

<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 bg-white shadow rounded-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 flex items-center space-x-4">
                        <img src="data:image/jpeg;base64,{{ base64_encode($item->product->image) }}" class="w-20 h-20 object-cover rounded">
                        <span class="text-gray-800 font-medium">{{ $item->product->title }}</span>
                    </td>
                    <td class="px-6 py-4 text-center text-gray-700 font-semibold">
                        ${{ number_format($item->product->price, 2) }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center justify-center space-x-2">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 text-center border rounded px-2 py-1">
                            <button type="submit" class="text-blue-500 hover:text-blue-700 font-medium">Update</button>
                        </form>
                    </td>
                    <td class="px-6 py-4 text-center text-gray-900 font-bold">
                        ${{ number_format($item->product->price * $item->quantity, 2) }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:text-red-700 font-medium">Remove</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500">No items added to your cart.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
</div>
@if($items->count() > 0)
<form action="{{ route('checkout.process') }}" method="POST" class="mt-6 flex justify-end">
    @csrf
    <button class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">
        Proceed to Checkout
    </button>
</form>

@endif
