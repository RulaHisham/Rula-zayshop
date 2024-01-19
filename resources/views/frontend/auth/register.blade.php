@extends('frontend.layout.app')
@section('content')

    <section class="login_box_area section_gap">
        <div class="container" style="height: 700px;">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">

                        <div class="hover">
                            <h4>Already have an account ?</h4>

                            <a class="primary-btn" style="text-decoration: none; color: green;" href="{{ route('login') }}">Signin</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Register</h3>
                        <form class="row login_form" action="{{ route('register') }}" method="post" id="contactForm"
                            novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="name" name="email" placeholder="Email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="name" name="password"
                                    placeholder="Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'">

                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="name" name="password_confirmation"
                                    placeholder="Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Register</button>
                                <a style="text-decoration: none; color: green;" href="#">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
