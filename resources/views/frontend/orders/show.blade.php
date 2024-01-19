@extends('frontend.layout.app')




@section('content')
    <div class="p-3 mb-3 invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> zay shop.
                    <small class="float-right">Date: {{ $order->created_at->toDateString() }}</small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">

            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>
                        {{ $order->name }}
                    </strong><br>
                    {{ $order->email }}<br>
                    {{ $order->phone }}<br>
                    {{ $order->city }}<br>
                    {{ $order->address }}<br>
                    {{ $order->postal_code }}<br>

                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice #{{ $order->id }}</b><br>
                <br>
                {{ $order->more_info ?? '' }}<br>
            </div>
            <!-- /.col -->


        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Qty</th>
                            <th>Product</th>
                            <th>Unit Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->product->image) }}" alt=""
                                        height="70">
                                    {{ $item->product->title }}
                                </td>
                                <td>
                                    ${{ $item->unit_price }}
                                </td>
                                <td>
                                    ${{ $item->total }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- /.col -->
            <div class="col-6">
                <p class="lead">Amount Due {{ $order->created_at->toDateString() }}</p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>${{ $order->total }}</td>
                        </tr>

                        <tr>
                            <th>Total:</th>
                            <td>${{ $order->total }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
