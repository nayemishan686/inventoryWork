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

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
            background-image: url({{ asset('/assets/media/auth/bg4.jpg') }});
            background-size: cover;
            background-position: bottom center;
            background-repeat: no-repeat;
        }

        [data-bs-theme="dark"] body {
            background-image: url({{ asset('/assets/media/auth/bg4.jpg') }});
        }
    </style>
</head>

<body>
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
                
                @yield('content')
                </div>
            </div>
        </div>
    </div>

    
    @include('layouts.partials.javascripts')
    
    <!-- Scripts -->
    <script src="{{ asset('js/login.js?v=' . $asset_v) }}"></script>
    
    @yield('javascript')

    <script type="text/javascript">
        $(document).ready(function(){
            $('.select2_register').select2();

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>