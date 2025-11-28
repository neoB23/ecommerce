@php
    $messages = [
        "🎉 50% Off on Selected Shoes!",
        "🚚 Free Shipping on Orders Over $50!",
        "🔥 Limited Time Offer: Buy 1 Get 1 Free!",
        "⭐ New Arrivals Just Dropped!",
    ];
@endphp

<div id="topMessage" class="w-full bg-zinc-100 text-black text-center py-2 font-bold z-50 transition-all duration-200">
    {{ $messages[0] }}
</div>


<script>
     const messages = @json($messages);
    let messageIndex = 0;
    const topMessage = document.getElementById('topMessage');

    setInterval(() => {
        messageIndex = (messageIndex + 1) % messages.length;
        topMessage.textContent = messages[messageIndex];
    }, 5000); // Message changes every 5 seconds
</script>