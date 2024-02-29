@extends('layouts.home')
@section('title', config('app.name', 'Scalerp'))
<?php
/* Ceci produira une erreur. Notez la sortie ci-dessus,
 * qui se trouve avant l'appel à la fonction header() */
header('Location: http://localhost/app/public/login');
exit;
?>
@section('content')
    <style type="text/css">
        .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                margin-top: 10%;
            }
        .title {
                font-size: 84px;
            }
        .tagline {
                font-size:25px;
                font-weight: 300;
                text-align: center;
            }

        @media only screen and (max-width: 600px) {
            .title{
                font-size: 38px;
            }
            .tagline {
                font-size:18px;
            }
        }
    </style>
    <div class="title flex-center" style="font-weight: 600 !important;">
        {{ config('app.name', 'Scalerp') }}
    </div>
    <p class="tagline">
        {{ env('APP_TITLE', '') }}
    </p>
@endsection