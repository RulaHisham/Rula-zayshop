
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                Zay
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('Home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('about')}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('shop')}}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('contact')}}">Contact</a>
                        </li>
                        <li class="nav-item">
                                <a class="btn btn-sm " href="{{ route('front.orders.index') }}">order_details</a>
                            </li>
                         @auth
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <input type="submit" class="btn btn-sm btn-danger" value="Logout">
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="btn btn-sm btn-success" href="{{ route('login') }}">Login</a>
                            </li>
                        @endguest


                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">

                   <ul>

                         @auth
                            <li class="nav-item"><a href="{{ route('cart.show') }}" class="cart"><span
                                        class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></span></a></li>
                        @endauth
                        @guest
                            <li class="nav-item"><a href="{{ route('login') }}" class="cart"><span
                                        class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></span></a></li>
                        @endguest

                    </ul>

                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->
