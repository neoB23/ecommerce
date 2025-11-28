@vite('resources/css/app.css')


@section('title', 'KickCraze - Mens Shoes')
@include('components.navbar')


<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Your Cart</h1>
    @if(session('cart') && count(session('cart')) > 0)
    <table class="w-full text-left border">
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $id => $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>${{ $item['price'] * $item['quantity'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('checkout.index') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Proceed to Checkout</a>
    @else
    <p>Your cart is empty.</p>
    @endif
</div>



@include('components.footer')
