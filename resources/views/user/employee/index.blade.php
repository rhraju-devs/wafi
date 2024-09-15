@extends('layouts.master')
@section('content')
    <div class="row mx-xxl-5 mx-lg-0  pb-3">
        <div class="col-lg-12 mb-4">
            <div class="base--card bg--white">
                <div class="filter--wrap">
                    <div class="d-flex gap-3 w-100 justify-content-end">
                        <form class="w-100">
                            <div class="d-flex flex-wrap gap-4 align-items-center">
                                <div class="flex-grow-1">
                                    <input type="text" name="name" value="{{ request()->name }}" placeholder="Name" class="form--control pill">
                                </div>

                                <div class="flex-grow-1">
                                    <input type="date" name="date_of_birth" value="{{ request()->date_of_birth }}" placeholder="Date of Birth" class="form--control pill">
                                </div>

                                <div class="flex-grow-1">
                                    <input type="email" name="email" value="{{ request()->email }}" placeholder="Email" class="form--control pill">
                                </div>

                                <div class="flex-grow-1">
                                    <input type="number" name="mobile" value="{{request()->mobile }}" placeholder="Mobile" class="form--control pill">
                                </div>

                                <div class="flex-grow-1 align-self-end align-items-center">
                                    <button class="btn btn--base radius--50 flex-shrink-0"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-lg-12">
            <div class="base--card bg--white">
                <div class="tbl-wrap">
                    <table class="table table--responsive--lg">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Date of Birth</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $item)
                                <tr>
                                    <td data-label="Photo">
                                        <div class="user-info">
                                            <div class="user-img">
                                                <img class="thumb rounded-circle" src="{{ getImage(getFilePath('employee') . '/' . @$item->image, getFileSize('employee')) }}" alt="@lang('Employee Image')">
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Full Name">{{ @$item->name }}<br>
                                    <td data-label="Email">{{ @$item->email }}</td>
                                    <td data-label="Mobile">{{ @$item->mobile }}</td>
                                    <td data-label="Date of Birth">{{ showDateTime($item->date_of_birth) }}</td>
                                    <td data-label="Action">
                                        <div class="button--group">
                                            <a href="{{route('user.employee.edit', $item->id)}}" class="btn btn--sm btn-outline--base">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <a href="{{ route('user.employee.delete', $item->id)}}" class="btn btn--sm btn-outline--danger">
                                                <i class="fa-solid fa-trash fa-fw text--danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No employee available now</td>
                            </tr>

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <!-- pagination -->
    <div class="row">
        <div class="col-lg-12">
            @if ($employees->hasPages())
                <div class="py-4">
                    {{ paginateLinks($employees) }}
                </div>
            @endif
        </div>
    </div>
    <!-- / pagination -->
@endsection
