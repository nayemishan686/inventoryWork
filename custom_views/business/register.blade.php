@extends('layouts.auth3')
@section('title', __('lang_v1.register'))

@section('content')
<div class="login-form col-md-12 col-xs-12 right-col-content-register">
    
    <p class="form-header text-white">@lang('business.register_and_get_started_in_minutes')</p>
    {!! Form::open(['url' => route('business.postRegister'), 'method' => 'post', 
                            'id' => 'business_register_form','files' => true ]) !!}
        @include('business.partials.register_form')
        {!! Form::hidden('package_id', $package_id); !!}
    {!! Form::close() !!}
</div>
@stop
@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        $('#change_lang').change( function(){
            window.location = "{{ route('business.getRegister') }}?lang=" + $(this).val();
        });
    })
</script>
<script>
$.get( "https://api.ipgeolocation.io/ipgeo?apiKey=53503907f15a4542a2f1a5bd2261c46f", function( data ) {
    if(data.currency) {
        $("#currency_id option:contains("+data.currency.code+")").prop("selected", "selected").trigger('change')
    }
    if(data.time_zone) {
        console.log(data.time_zone.name)
        $("#time_zone").val(data.time_zone.name).trigger('change')
    }
    if(data.zipcode) {
        $("#zip_code").val(data.zipcode)
    }
    if(data.state_prov) {
        $("#state").val(data.state_prov)
    }
    if(data.city) {
        $("#city").val(data.city)
    }
    if(data.country_name) {
        $("#country").val(data.country_name)
    }
});

</script>
@endsection