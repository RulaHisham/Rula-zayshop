 @extends('frontend.layout.app')
@section('content')

 <h1>Welcome, {{ auth()->user()->name }}!</h1>

    <h2>Your Orders:</h2>
    <ul>
      <h1>Welcome, {{ auth()->user()->name }}!</h1>

    <h2>Your Orders:</h2>
    <ul>
        @forelse($userOrders as $order)
            <li>Order {{ $order->order_number }} - Total Amount: {{ $order->total_amount }}</li>
        @empty
            <li>No orders found.</li>
        @endforelse
    </ul>
    </ul>


@endsection
