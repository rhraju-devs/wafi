@extends('layouts.master')
@section('content')
<div class="row gy-4 mx-xxl-5 mx-lg-0 justify-content-center">
    <div class="col-lg-12 justify-content-center">
        <div class="base--card bg--white">
            <form action="{{route('user.employee.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row gy-3">
                    <div class="col-lg-12">
                        <h4 class="mb-1">Employee Information</h4>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="name" class="form--label mb-3"> Full Name</label>
                            <input type="text" class="form--control" name="name" id="name" placeholder="Ex. John Doe" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="email" class="form--label mb-3">Email</label>
                            <input type="email" class="form--control" name="email" id="email" placeholder="Ex. example@gmail.com" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="mobile" class="form--label mb-3">Mobile</label>
                            <input type="number" class="form--control" name="mobile" id="mobile" placeholder="Ex. 01521471117" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="date_of_birth" class="form--label mb-3">Date Of Birth</label>
                            <input type="date" class="form--control" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="image" class="form--label mb-2">Profile Image</label>
                            <input type="file" class="form--control" name="image" placeholder="Select Profile Image" accept=".png, .jpg, .jpeg" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="password" class="form--label mb-2">Password</label>
                            <input type="password" class="form--control" name="password" placeholder="************" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn--base btn-lg w-100">Add Employee</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
