@extends('frontend.layout.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $status }} Orders Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="p-0 card-body table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>Payment Status</th>
                                <th>Delievery Status</th>
                                <th>Payment Method</th>
                                <th>#Products</th>
                                <th>Total</th>
                                <th>Ordered At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>
                                        @if ($order->status == 'pending')
                                            <span class="badge badge-warning" style="color: black;">Pending</span>
                                        @elseif($order->status == 'accepted')
                                            <span class="badge badge-info" style="color: black;">Accepted</span>
                                        @elseif($order->status == 'rejected')
                                            <span class="badge badge-danger" style="color: black;">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->payment_status == 'paid')
                                            <span class="badge badge-success" style="color: black;">Paid</span>
                                        @else
                                            <span class="badge badge-danger" style="color: black;">Unpaid</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->delivery_status == 'delivered')
                                            <span class="badge badge-success" style="color: black;">Delievered</span>
                                        @else
                                            <span class="badge badge-danger" style="color: black;">Undelievered</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>
                                        {{ $order->products_count }}
                                    </td>
                                    <td>{{ $order->total }}</td>
                                    <td>
                                        {{ $order->created_at->toDateString() }}
                                    </td>
                                    <td class="gap-2 d-flex">
                                        <a href="{{ route('front.orders.show' , $order->id) }}"
                                            class="btn btn-sm btn-info">Show</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center">No Products Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
