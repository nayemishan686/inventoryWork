@extends('layouts.auth3')
@section('title', __('lang_v1.register'))

@section('content')
    <style>

        .flex-lg-start {
            display: none;
        }

        .wizard>.content {
            background: #FFFFFF !important;
            border-radius: 10px;
        }

        .left-side {
    display: flex;
    flex-direction: column;
    justify-content: center; /* Vertically center content */
    align-items: center; /* Horizontally center content */
    height: 100vh; /* Adjust height as needed */
    text-align: center; /* Center text */
}

    </style>
    <div class="row d-flex align-items-end ">
        <div class="col-lg-4 col-md-12 col-xs-12 left-side">
            <!--begin::Logo-->
            <a href="https://my.scalerp.com/" class="mb-7">
                <img src="/uploads/logo.png" class="img-rounded" alt="Logo" width="150">
            </a>
            <!--end::Logo-->
        
            <!--begin::Title-->
            <h2 class="text-white fw-normal m-0">
                Scale UP your business
            </h2>
        </div>
        
        <div class="login-form col-lg-8 col-md-12 col-xs-12 right-col-content-register">

            <p class="form-header text-white">@lang('business.register_and_get_started_in_minutes')</p>
            {!! Form::open([
                'url' => route('business.postRegister'),
                'method' => 'post',
                'id' => 'business_register_form',
                'files' => true,
            ]) !!}
            @include('business.partials.register_form')
            {!! Form::hidden('package_id', $package_id) !!}
            {!! Form::close() !!}

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
        </div>

    </div>

@stop
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.change_lang').change(function() {
                window.location = "{{ route('business.getRegister') }}?lang=" + $(this).val();
            });
        })
    </script>
    <script>
        $.get("https://api.ipgeolocation.io/ipgeo?apiKey=53503907f15a4542a2f1a5bd2261c46f", function(data) {
            if (data.currency) {
                $("#currency_id option:contains(" + data.currency.code + ")").prop("selected", "selected").trigger(
                    'change')
            }
            if (data.time_zone) {
                console.log(data.time_zone.name)
                $("#time_zone").val(data.time_zone.name).trigger('change')
            }
            if (data.zipcode) {
                $("#zip_code").val(data.zipcode)
            }
            if (data.state_prov) {
                $("#state").val(data.state_prov)
            }
            if (data.city) {
                $("#city").val(data.city)
            }
            if (data.country_name) {
                $("#country").val(data.country_name)
            }
        });
    </script>
@endsection
