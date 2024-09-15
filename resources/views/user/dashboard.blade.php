@extends('layouts.master')
@section('content')
<div class="row gy-4 mx-xxl-5 mx-lg-0 justify-content-center">
    <div class="col-lg-4">
        <div class="dashboard_profile-card">
            <div class="user-profile text-center">
                <div class="dashboard_profile_wrap">
                    <div class="profile_photo mb-2">
                        <img src="{{ getImage(getFilePath('adminProfile') . '/' . auth()->user()->image, getFileSize('adminProfile')) }}" alt="Click to change image">
                        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="photo_upload">
                                <label for="photo_upload"><i class="fa-regular fa-image"></i></label>
                                <input id="photo_upload" name="image" type="file" class="upload_file"
                                    onchange="this.form.submit()" accept=".png, .jpeg, .jpg">
                            </div>
                        </form>
                    </div>
                    <div class="profile-details">
                        <ul>
                            <li>
                                <p class="user-name">{{ auth()->user()->email }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="contact-info">
                <div class="info-wrap">
                    <div class="info">
                        <i class="fa-regular fa-envelope"></i>
                        <p>Email Address</p>
                    </div>
                    <span>{{ auth()->user()->email }}</span>
                </div>
            </div>
            <div class="contact-info">
                <div class="info-wrap">
                    <div class="info">
                        <i class="fa-solid fa-user"></i>
                        <p>Name</p>
                    </div>
                    <span>{{ auth()->user()->name }}</span>
                </div>
            </div>
            <div class="contact-info">
                <div class="info-wrap">
                    <div class="info">
                        <i class="fa-solid fa-phone"></i>
                        <p>Mobile Number</p>
                    </div>
                    <span>{{ auth()->user()->mobile }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8 justify-content-center">
        <div class="base--card bg--white mb-4">
            <form action="{{route('user.submit.profile')}}" method="POST">
                @csrf
                <div class="row gy-3">
                    <div class="col-lg-12">
                        <h4 class="mb-1">Admin Information</h4>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="name" class="form--label mb-3">Name</label>
                            <input type="text" class="form--control" id="name" name="name" value="{{auth()->user()->name}}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="email" class="form--label mb-3"> Email</label>
                            <input type="email" class="form--control" id="email" name="email" value="{{auth()->user()->email}}">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn--base btn-lg w-100">Update Now</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="base--card bg--white mb-4">
            <form action="{{route('user.change.password')}}" method="POST">
                @csrf
                <div class="row gy-3">
                    <div class="col-lg-12">
                        <h4 class="mb-1">Change Password</h4>
                    </div>
                    <div class="mb-4 form-group">
                        <label class="mb-2 form--label">@lang('Current Password')</label>
                        <div class="input--group position-relative">
                            <input type="password" name="current_password" id="current_password" class="form--control bg--white" placeholder="@lang('Current Password')" required>
                            <div class="password-show-hide fas fa-eye-slash toggle-password-change"
                                data-target="current_password"></div>
                        </div>
                    </div>

                    <div class="mb-4 form-group">
                        <label class="mb-2 form--label">@lang('New Password')</label>
                        <div class="input--group position-relative">
                            <input type="password" name="password" id="password" class="form--control bg--white" placeholder="@lang('New Password')" required>
                            <div class="password-show-hide fas fa-eye-slash toggle-password-change"
                                data-target="password"></div>
                        </div>
                    </div>


                    <div class="mb-4 form-group">
                        <label class="mb-2 form--label">@lang('Confirm Password')</label>
                        <div class="input--group position-relative">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form--control bg--white" placeholder="@lang('Confirm Password')" required>
                            <div class="password-show-hide fas fa-eye-slash toggle-password-change"
                                data-target="password_confirmation"></div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn--base btn-lg w-100">Update Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
