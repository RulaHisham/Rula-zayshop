

 @extends('frontend.layout.app')
@section('content')





    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>

                <ul class="list-unstyled templatemo-accordion">
                   @foreach ($mainCategories as $category)
                            <li class="pb-3">
                                <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                          {{$category->name}}
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                              <ul class="collapse show list-unstyled pl-3">
                                    @foreach ($category->childrens as $child)
                                        <li class="main-nav-list child"><a
                                                href="{{ route('shop') }}?category={{ $child->id }}">
                                                {{ $child->name }}
                                                <span class="number">({{ $child->products_count }})</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                </ul>



            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-5">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="{{ route('shop') }}">All</a>
                            </li>
                             @foreach ($mainCategories as $category)
                             @foreach ($category->childrens as $child)
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="{{ route('shop') }}?category={{ $child->id }}">{{ $child->name }}</a>
                            </li>
                             @endforeach
                              @endforeach

                        </ul>
                    </div>
                </div>
                <div class="row">
                  @forelse ($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $product->image)}}">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2" href="{{route('product.show', $product->id)}}"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="{{route('cart.addToSession', $product->id)}}"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none">{{ $product->title }}</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>M/L/X/XL</li>

                                </ul>

                                @if ($product->discount_price)
                                            <div class="price">
                                                <h6>${{ $product->discount_price }}(discountprice)</h6>
                                                <h6 class="l-through">${{ $product->price }}(Price)</h6>
                                            </div>
                                        @else
                                            <div class="price">
                                                <h6>${{ $product->price }}(Price)</h6>
                                            </div>
                                        @endif
                            </div>
                        </div>
                        @empty

                            <div class="my-5 col-12">
                                <h6 class="p-4 text-center text-white rounded bg-secondary">
                                    No Product Found
                                </h6>
                            </div>
                        @endforelse
                    </div>




            </div>
  {{ $products->links() }}
        </div>
    </div>
    <!-- End Content -->
  @endsection
