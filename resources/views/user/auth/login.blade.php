@extends('layouts.auth')
@section('content')
    <section class="login-section">
        <div class="container-fluid px-0">
            <div class="row justify-content-center mx-0">

                <div class="col-xl-4 col-lg-6 col-md-8 px-0">
                    <div class="login-box bg--white">

                        <div class="home--btn bg--base radius--50 d-lg-none d-flex justify-content-center align-items-center">
                            <a href="javascript:void(0)" class="text-white">
                                <i class="fa-solid fa-house "></i>
                            </a>
                        </div>

                        <div class="icon-wrap">
                            <div class="icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </div>
                        <h4 class="title fw--300">@lang('Login to Your Account')</h4>

                        <form action="{{ route('user.login.submit') }}" method="POST">
                            @csrf
                            <div class="mb-4 form-group">
                                <label class="mb-2 form--label">@lang('Email')</label>
                                <input type="email" name="email" id="username" value="{{ old('username') }}" class="form--control bg--white" placeholder="@lang('Ex: admin@example.com')" required>
                            </div>

                            <div class="mb-4 form-group">
                                <label class="mb-2 form--label">@lang('Password')</label>
                                <div class="input--group position-relative">
                                    <input type="password" name="password" id="password" class="form--control bg--white"
                                        placeholder="@lang('Password')" required>
                                    <div class="password-show-hide fas fa-eye-slash toggle-password-change"
                                        data-target="password"></div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn--base-two btn-lg w-100">@lang('Sign In')</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
