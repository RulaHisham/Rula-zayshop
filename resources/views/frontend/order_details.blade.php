 @extends('frontend.layout.app')
@section('content')

   <h1>Order Details - {{ $order->order_number }}</h1>

    <!-- Display order details here -->
    <p>Total Amount: {{ $order->total_amount }}</p>
    <!-- Add other order details as needed -->
@endsection
