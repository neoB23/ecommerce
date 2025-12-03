@vite('resources/css/app.css')
<tbody>
    @foreach ($orders as $order)
        <tr class="border-b border-opacity-20 dark:border-gray-300 dark:bg-gray-50">
            <td class="p-3">
                <p>{{ $order->id }}</p>
            </td>

            <td class="p-3">
                <p>{{ $order->customer->name ?? 'No Name' }}</p>
            </td>

            <td class="p-3">
                <p>{{ $order->created_at->format('d M Y') }}</p>
                <p class="dark:text-gray-600">{{ $order->created_at->format('l') }}</p>
            </td>

            <td class="p-3">
                <p>{{ $order->due_date ?? 'N/A' }}</p>
            </td>

            <td class="p-3 text-right">
                <p>₱{{ number_format($order->total_amount, 2) }}</p>
            </td>

            <td class="p-3 text-right">
                <span class="px-3 py-1 font-semibold rounded-md 
                    {{ $order->status == 'Pending' ? 'dark:bg-violet-600' : 'dark:bg-green-600' }}
                    dark:text-gray-50">
                    <span>{{ $order->status }}</span>
                </span>
            </td>
        </tr>
    @endforeach
</tbody>
