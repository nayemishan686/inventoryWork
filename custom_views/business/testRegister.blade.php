
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'POS') }}</title> 

    @include('layouts.partials.css')
    <link href="{{asset('/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{asset('/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>

     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>        <!--end::Fonts-->

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<html lang="en" >

<head>
        <title>@yield('title') - {{ config('app.name', 'POS') }}</title>
        <meta charset="utf-8"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=" "/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <!--begin::Fonts(mandatory for all pages)-->
       

    </head>
    <!--end::Head-->

    <!--begin::Body-->
 <body  id="kt_body"  class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat" >


 @inject('request', 'Illuminate\Http\Request')
    @if (session('status') && session('status.success'))
        <input type="hidden" id="status_span" data-status="{{ session('status.success') }}" data-msg="{{ session('status.msg') }}">
    @endif


<!--end::Theme mode setup on page load-->
                    <!--Begin::Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Page bg image-->
<style>
    body {
        background-image: url({{asset('/assets/media/auth/bg4.jpg')}});
    }

    [data-bs-theme="dark"] body {
        background-image: url({{asset('/assets/media/auth/bg4.jpg')}});
    }
</style>
<!--end::Page bg image-->

<!--begin::Authentication - Sign-in -->
<div class="d-flex flex-column flex-column-fluid flex-lg-row">
    <!--begin::Aside-->
    <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">              
        <!--begin::Aside-->
        <div class="d-flex flex-center flex-lg-start flex-column">              
            <!--begin::Logo-->
            <a href="https://my.scalerp.com/" class="mb-7">
                @if(file_exists(public_path('uploads/logo.png')))
                        <img src="/uploads/logo.png" class="img-rounded" alt="Logo" width="150">
                @else
                   {{ config('app.name', 'ultimatePOS') }}
                @endif 
            </a>    
            <!--end::Logo-->            

            <!--begin::Title-->
            <h2 class="text-white fw-normal m-0"> 
                @if(!empty(config('constants.app_title')))
                        {{config('constants.app_title')}}
                    @endif
            </h2>  
            <!--end::Title-->         
        </div>
        <!--begin::Aside-->    
    </div>
    <!--begin::Aside-->

    
			 {{-- My code start --}}
                 <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
        <!--begin::Card-->
        <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
            <!--begin::Wrapper-->
            <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">

                <!--begin::Form-->
                <p class="form-header text-white">@lang('lang_v1.login')</p>
                {!! Form::open(['url' => route('business.postRegister'), 'method' => 'post', 
                            'id' => 'business_register_form','files' => true ]) !!}
        @include('business.partials.register_form')
        {!! Form::hidden('package_id', $package_id); !!}
    {!! Form::close() !!}



                <!--end::Form-->






             {{-- My code end --}}



            </div>
            <!--end::Wrapper-->

            <!--begin::Footer-->  
            <div class="d-flex flex-stack px-lg-10">
                <!--begin::Languages-->
                <div class="me-0">             
                    <!--begin::Toggle-->
                    @foreach(config('constants.langs') as $key => $val)

                    @if( (empty(request()->lang) && config('app.locale') == $key) 
                            || request()->lang == $key) 
                    <button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
                        <img  data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3" src="{{asset($val['image'])}}" alt=""/>
                        
                        <span data-kt-element="current-lang-name" class="me-1">{{$val['full_name']}}</span>

                        <i class="ki-duotone ki-down fs-5 text-muted rotate-180 m-0"></i>                    </button>
                       @endif
                      @endforeach
                    <!--end::Toggle-->

                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">
                                                    <!--begin::Menu item-->
                    	@foreach(config('constants.langs') as $key => $val)
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link d-flex px-5 change_lang" data-kt-lang="{{$val['full_name']}}" data-key="{{$key}}">
                                    <span class="symbol symbol-20px me-4">
                                        <img data-kt-element="lang-flag" class="rounded-1" src="{{asset($val['image'])}}" alt=""/>
                                    </span>
                                    <span data-kt-element="lang-name">{{$val['full_name']}}</span>
                                </a>
                            </div>
                    	@endforeach
        
                            <!--end::Menu item-->
                                            </div>
                    <!--end::Menu-->           
                </div>
                <!--end::Languages--> 

                <!--begin::Links-->
                <div class="d-flex fw-semibold text-primary fs-base gap-5">
                    <a href="https://preview.keenthemes.com/metronic8/demo1/pages/team.html" target="_blank">Terms</a>

                    <a href="https://preview.keenthemes.com/metronic8/demo1/pages/pricing/column.html" target="_blank">Plans</a>
                    
                    <a href="https://preview.keenthemes.com/metronic8/demo1/pages/contact.html" target="_blank">Contact Us</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Body-->
</div>
<!--end::Authentication - Sign-in--></div>
<!--end::Root-->
        
        <!--begin::Javascript-->



    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
          
        <!--end::Custom Javascript-->
<!--end::Javascript-->


    @include('layouts.partials.javascripts')
    
    <!-- Scripts -->
    <script src="{{ asset('js/login.js?v=' . $asset_v) }}"></script>

      <script src="{{asset('/assets/plugins/global/plugins.bundle.js')}}"></script>
        <script src="{{asset('/assets/js/scripts.bundle.js')}}"></script>
        <script src="{{asset('/assets/js/sign-in/general.js')}}"></script>
    
     <script type="text/javascript">
</script>

</body>

</html>
