@extends('layouts.auth2')

@section('title', __('lang_v1.reset_password'))

@section('content')

 <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
        <!--begin::Card-->
        <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
            <!--begin::Wrapper-->
            <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                
@if(session('status') && is_string(session('status')))
        <div class="alert alert-info" role="alert">{{ session('status') }}</div>
    @endif
<!--begin::Form-->

<form  class="form w-100"  novalidate="novalidate" id="kt_password_reset_form"  method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
    <!--begin::Heading-->
    <div class="text-center mb-10">
        <!--begin::Title-->
        <h1 class="text-gray-900 fw-bolder mb-3">
            Forgot Password ?
        </h1>
        <!--end::Title-->

        <!--begin::Link-->
        <div class="text-gray-500 fw-semibold fs-6">
            Enter your email to reset your password.
        </div>
        <!--end::Link-->
    </div>
    <!--begin::Heading-->

    <!--begin::Input group--->
    <div class="fv-row mb-8 {{ $errors->has('email') ? ' has-error' : '' }}">
        <!--begin::Email-->

            <input id="email" type="email" class="form-control bg-transparent" name="email" value="{{ old('email') }}" required autofocus placeholder="@lang('lang_v1.email_address')">
            <span class="fa fa-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        <!--end::Email-->
    </div>

    <!--begin::Actions-->
    <div class="d-flex flex-wrap justify-content-center pb-lg-0">
        <button type="submit" id="kt_password_reset_submit" class="btn btn-primary me-4">
            
<!--begin::Indicator label-->
<span class="indicator-label">
     @lang('lang_v1.send_password_reset_link')</span>
<!--end::Indicator label-->

<!--begin::Indicator progress-->
<span class="indicator-progress">
    Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>
<!--end::Indicator progress-->        </button>

        <a href="{{route('login')}}" class="btn btn-light">Cancel</a>
    </div>
    <!--end::Actions-->
</form>
@endsection
