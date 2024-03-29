
 @extends('frontend.layout.app')
@section('content')

    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5 d-flex justify-content-center align-items-center">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3 " style="width: 400px; height: 300px; transition: transform 0.3s ease-in-out; ">
                        <img class="card-img img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="Card image cap" id="product-detail">
                    </div>
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">$products->title</h1>
                            <p class="h3 py-2">{{ $product->discount_price ?? $product->price }}</p>

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Category:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <a class="active" style="text-decoration: none; color: green;"
                                    href="{{ route('shop') }}?category={{ $product->category->id }}"><span>Category</span> :
                                    {{ $product->category->name }}</a>
                                </li>
                            </ul>

                            <h6>Description</h6>
                            <p>{{$product->description}}</p>



                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item">Size :
                                                <input type="hidden" name="product-size" id="product-size" value="S">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">S</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">M</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">L</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">XL</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                                <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <a href="{{route('cart.addToSession', $product->id)}}" type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->



@endsection
