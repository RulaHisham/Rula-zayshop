@extends('frontend.layout.app')
@section('content')

    <section class="login_box_area section_gap">
        <div class="container " style="height: 700px;">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="{{ asset('front/img/login.jpg') }}" alt="">
                        <div class="hover">
                            <h4>New to our website?</h4>

                            <a class="primary-btn"   style="text-decoration: none; color: green;"  href="{{ route('register') }}">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Log in to enter</h3>
                        <form class="row login_form" action="{{ route('login') }}" method="post" id="contactForm"
                            novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="name" name="email" placeholder="Email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="password"
                                    placeholder="Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group" >
                                <button type="submit" value="submit" class="primary-btn">Log In</button>
                                <a style="text-decoration: none; color: green;" href="#">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
