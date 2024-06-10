@extends('layouts.auth')

@section('content')
<div class="row no-gutter">
    <!-- The image half -->
    <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
        <div class="row wd-100p mx-auto text-center">
            <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                <img src="{{ asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
            </div>
        </div>
    </div>
    <!-- The content half -->
    <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
        <div class="login d-flex align-items-center py-2">
            <!-- Demo content-->
            <div class="container p-0">
                <div class="row">
                    <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                        <div class="card-sigin">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="mb-5 d-flex">
                                <a href="{{url('/')}}"><img src="{{asset('assets/img/brand/favicon.png')}}" class="sign-favicon-a ht-40" alt="logo">
                                <img src="{{asset('assets/img/brand/favicon-white.png')}}" class="sign-favicon-b ht-40" alt="logo">
                                </a>
                                <h1 class="main-logo1 ms-1 me-0 my-auto tx-28">Pos<span>I</span>Ta</h1>
                            </div>
                            <div class="card-sigin">
                                <div class="main-signin-header">
                                    <h2>Forgot Password!</h2>
                                    <h4>Please Enter Your Email</h4>
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" @error('email') is-invalid @enderror placeholder="Enter your email" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Send') }}
                                        </button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End -->
        </div>
    </div><!-- End -->
</div>
@endsection
