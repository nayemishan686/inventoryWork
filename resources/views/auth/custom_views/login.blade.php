@extends('auth.custom_views.layout')
@section('title', __('lang_v1.login'))

@section('content')
    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
        <!--begin::Card-->
        <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
            <!--begin::Wrapper-->
            <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                
<!--begin::Form-->
<p class="form-header text-white">@lang('lang_v1.login')</p>
        <form method="POST" action="{{ route('login') }}" id="kt_sign_in_form" class="form w-100" novalidate="novalidate" >

        	 {{ csrf_field() }}
    <!--begin::Heading-->
    <div class="text-center mb-11">
        <!--begin::Title-->
        <h1 class="text-gray-900 fw-bolder mb-3">
            @lang('lang_v1.login')
        </h1>
        <!--end::Title-->

        <!--begin::Subtitle-->
        <div class="text-gray-500 fw-semibold fs-6">
            Your Social Campaigns
        </div>
        <!--end::Subtitle--->
    </div>
    <!--begin::Heading-->

    <!--begin::Login options-->
    <div class="row g-3 mb-9">
        <!--begin::Col-->
        <div class="col-md-6">
            <!--begin::Google link--->
            <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                <img alt="Logo" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/brand-logos/google-icon.svg" class="h-15px me-3"/>   
                Sign in with Google
            </a>
            <!--end::Google link--->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-md-6">
            <!--begin::Google link--->
            <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                <img alt="Logo" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/brand-logos/apple-black.svg" class="theme-light-show h-15px me-3"/>
                <img alt="Logo" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show h-15px me-3"/>     
                Sign in with Apple
            </a>
            <!--end::Google link--->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Login options-->

    <!--begin::Separator-->
    <div class="separator separator-content my-14 ">
        <span class="w-125px text-gray-500 fw-semibold fs-7">Or with username</span>
    </div>
	    @php
		    $username = old('username');
		    $password = null;
		    if(config('app.env') == 'demo'){
		        $username = 'admin';
		        $password = '123456';

		        $demo_types = array(
		            'all_in_one' => 'admin',
		            'super_market' => 'admin',
		            'pharmacy' => 'admin-pharmacy',
		            'electronics' => 'admin-electronics',
		            'services' => 'admin-services',
		            'restaurant' => 'admin-restaurant',
		            'superadmin' => 'superadmin',
		            'woocommerce' => 'woocommerce_user',
		            'essentials' => 'admin-essentials',
		            'manufacturing' => 'manufacturer-demo',
		        );

		        if( !empty($_GET['demo_type']) && array_key_exists($_GET['demo_type'], $demo_types) ){
		            $username = $demo_types[$_GET['demo_type']];
		        }
		    }
		@endphp
    <!--end::Separator-->

    <!--begin::Input group--->
    <div class="fv-row mb-8 has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
        <!--begin::Username-->
        <input  type="text" class="form-control bg-transparent" name="username" value="{{ $username }}" required autofocus placeholder="@lang('lang_v1.username')">
        <span class=" form-control-feedback "></span>
        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
        <!--end::Email-->
    </div>

    <!--end::Input group--->
    <div class="fv-row mb-3">    
        <!--begin::Password-->

        <input id="password" type="password" class="form-control bg-transparent" name="password"
                value="{{ $password }}" required placeholder="@lang('lang_v1.password')">
                <span class=" form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        <!--end::Password-->
    </div>
    <!--end::Input group--->
    <!-- <div class="form-group">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('lang_v1.remember_me')
                    </label>
                </div>
            </div>
 -->    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <div></div>

        <!--begin::Link-->
            @if(config('app.env') != 'demo')
                <a href="{{ route('password.request') }}" class="link-primary">
                    @lang('lang_v1.forgot_your_password')
                </a>
            @endif
        </a>
        <!--end::Link-->
    </div>
    <!--end::Wrapper--> 

     @if(config('app.env') == 'demo')
    <div class="col-md-12 col-xs-12" style="padding-bottom: 30px;">
        @component('components.widget', ['class' => 'box-primary', 'header' => '<h4 class="text-center">Demo Shops <small><i> Demos are for example purpose only, this application <u>can be used in many other similar businesses.</u></i></small></h4>'])

            <a href="?demo_type=all_in_one" class="btn btn-app bg-olive demo-login" data-toggle="tooltip" title="Showcases all feature available in the application." data-admin="{{$demo_types['all_in_one']}}"> <i class="fas fa-star"></i> All In One</a>

            <a href="?demo_type=pharmacy" class="btn bg-maroon btn-app demo-login" data-toggle="tooltip" title="Shops with products having expiry dates." data-admin="{{$demo_types['pharmacy']}}"><i class="fas fa-medkit"></i>Pharmacy</a>

            <a href="?demo_type=services" class="btn bg-orange btn-app demo-login" data-toggle="tooltip" title="For all service providers like Web Development, Restaurants, Repairing, Plumber, Salons, Beauty Parlors etc." data-admin="{{$demo_types['services']}}"><i class="fas fa-wrench"></i>Multi-Service Center</a>

            <a href="?demo_type=electronics" class="btn bg-purple btn-app demo-login" data-toggle="tooltip" title="Products having IMEI or Serial number code."  data-admin="{{$demo_types['electronics']}}" ><i class="fas fa-laptop"></i>Electronics & Mobile Shop</a>

            <a href="?demo_type=super_market" class="btn bg-navy btn-app demo-login" data-toggle="tooltip" title="Super market & Similar kind of shops." data-admin="{{$demo_types['super_market']}}" ><i class="fas fa-shopping-cart"></i> Super Market</a>

            <a href="?demo_type=restaurant" class="btn bg-red btn-app demo-login" data-toggle="tooltip" title="Restaurants, Salons and other similar kind of shops." data-admin="{{$demo_types['restaurant']}}"><i class="fas fa-utensils"></i> Restaurant</a>
            <hr>

            <i class="icon fas fa-plug"></i> Premium optional modules:<br><br>

            <a href="?demo_type=superadmin" class="btn bg-red-active btn-app demo-login" data-toggle="tooltip" title="SaaS & Superadmin extension Demo" data-admin="{{$demo_types['superadmin']}}"><i class="fas fa-university"></i> SaaS / Superadmin</a>

            <a href="?demo_type=woocommerce" class="btn bg-woocommerce btn-app demo-login" data-toggle="tooltip" title="WooCommerce demo user - Open web shop in minutes!!" style="color:white !important" data-admin="{{$demo_types['woocommerce']}}"> <i class="fab fa-wordpress"></i> WooCommerce</a>

            <a href="?demo_type=essentials" class="btn bg-navy btn-app demo-login" data-toggle="tooltip" title="Essentials & HRM (human resource management) Module Demo" style="color:white !important" data-admin="{{$demo_types['essentials']}}">
                    <i class="fas fa-check-circle"></i>
                    Essentials & HRM</a>
                    
            <a href="?demo_type=manufacturing" class="btn bg-orange btn-app demo-login" data-toggle="tooltip" title="Manufacturing module demo" style="color:white !important" data-admin="{{$demo_types['manufacturing']}}">
                    <i class="fas fa-industry"></i>
                    Manufacturing Module</a>

            <a href="?demo_type=superadmin" class="btn bg-maroon btn-app demo-login" data-toggle="tooltip" title="Project module demo" style="color:white !important" data-admin="{{$demo_types['superadmin']}}">
                    <i class="fas fa-project-diagram"></i>
                    Project Module</a>

            <a href="?demo_type=services" class="btn btn-app demo-login" data-toggle="tooltip" title="Advance repair module demo" style="color:white !important; background-color: #bc8f8f" data-admin="{{$demo_types['services']}}">
                    <i class="fas fa-wrench"></i>
                    Advance Repair Module</a>

            <a href="{{url('docs')}}" target="_blank" class="btn btn-app" data-toggle="tooltip" title="Advance repair module demo" style="color:white !important; background-color: #2dce89">
                    <i class="fas fa-network-wired"></i>
                    Connector Module / API Documentation</a>
        @endcomponent   
    </div> 

@endif   

    <!--begin::Submit button-->
    <div class="d-grid mb-10">
        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            
<!--begin::Indicator label-->
<span class="indicator-label">
   @lang('lang_v1.login')</span>
<!--end::Indicator label-->

<!--begin::Indicator progress-->
<span class="indicator-progress">
    Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>
<!--end::Indicator progress-->        </button>
    </div>
    <!--end::Submit button-->

    <!--begin::Sign up-->
    <div class="text-gray-500 text-center fw-semibold fs-6">
        Not a Member yet?

        <a href="sign-up.html" class="link-primary">
            Sign up
        </a>
    </div>
    <!--end::Sign up-->
</form>


                
<!--end::Form-->     
@endsection