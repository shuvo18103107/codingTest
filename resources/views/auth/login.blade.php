@extends('layouts.auth')

@section('content')
    <!-- Sing Up Area Start -->
    <section class="p-0">
        <div class="">
            <div class="row">
                <div class="col-md-5">
                    <div class="sign-up-left-content">
                        <div class="sign-up-top-logo">
                            <a href="#"><img src="{{ getImageFile('images/logo.png') }}" alt="logo"></a>
                        </div>


                        <div class="sign-up-bottom-img">
                            <img src="{{ getImageFile('images/sign-left.jpg') }}" alt="hero" class="img-fluid">
                        </div>

                    </div>
                </div>
                <div class="col-md-7">
                    <div class="sign-up-right-content bg-white">
                        <div class="m-auto">
                            <h2 class="mb-3" id="sign-in-header">Sign In</h2>
                            <div class="tab-content" id="tab-tabContent">
                                <div class="tab-pane fade show active" id="tab-institute" role="tabpanel"
                                    aria-labelledby="tab-institute-tab">
                                    <form id="institute_login_form" method="POST" action="{{ route('signin') }}">
                                        <!-- <form method="POST" action=""> -->
                                        @csrf

                                        <p class="font-14 mb-30">{{ __('New User') }} ? <a href="{{ route('signup') }}"
                                                class="color-hover text-decoration-underline font-medium">{{ __('Create an Account') }}</a>
                                        </p>

                                        <div class="row mb-30">
                                            <div class="col-md-12">
                                                <label
                                                    class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Email') }}</label>
                                                <input name="email" value="{{ old('email') }}" class="form-control email"
                                                    placeholder="{{ __('Type your email') }}">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                        {{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-30">
                                            <div class="col-md-12">
                                                <label
                                                    class="label-text-title color-heading font-medium font-16 mb-3">{{ __('Password') }}</label>
                                                <div class="form-group mb-0 position-relative">
                                                    <input class="form-control password" name="password"
                                                        value="{{ old('password') }}" placeholder="*********"
                                                        type="password">
                                                    <span class="toggle cursor fas fa-eye pass-icon"></span>
                                                </div>

                                                @if ($errors->has('password'))
                                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                        {{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row mb-30">
                                            <div class="col-md-12"><a href="#"
                                                    class="color-hover text-decoration-underline font-medium">{{ __('Forgot Password') }}?</a>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-12">
                                                <button type="submit"
                                                    class="theme-btn theme-button1 theme-button3 font-15 fw-bold w-100">{{ __('Sign In') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
