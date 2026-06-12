<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.welcome_title') }}</title>
</head>
<body style="
    background-color:#f3f4f6;
    font-family:Arial, sans-serif;
    margin:0;
">



    <div style="
        max-width:900px;
        margin:50px auto;
        background-color:white;
        padding:40px;
        border:1px solid #d1d5db;
    ">
<div style="
    display:flex;
    justify-content:flex-end;
    margin-bottom:20px;
">
    <a href="{{ route('language.switch', 'lv') }}"
       style="
            margin-right:15px;
            text-decoration:none;
            color:#1f2937;
            font-weight:bold;
       ">
        LV
    </a>

    <a href="{{ route('language.switch', 'en') }}"
       style="
            text-decoration:none;
            color:#1f2937;
            font-weight:bold;
       ">
        EN
    </a>
</div>
        <h1 style="
            margin-bottom:15px;
            color:#1f2937;
        ">
            {{ __('messages.welcome_title') }}
        </h1>

        <p style="
            font-size:18px;
            margin-bottom:30px;
            color:#4b5563;
        ">
            {{ __('messages.welcome_description') }}
        </p>

        <h2 style="
            margin-bottom:20px;
            color:#1f2937;
        ">
            {{ __('messages.features') }}
        </h2>

        <ul style="
            line-height:2;
            margin-bottom:40px;
        ">
            <li>{{ __('messages.feature_1') }}</li>
            <li>{{ __('messages.feature_2') }}</li>
            <li>{{ __('messages.feature_3') }}</li>
            <li>{{ __('messages.feature_4') }}</li>
        </ul>

        <div>

            <a href="{{ route('login') }}"
               style="
                   background-color:#0d6efd;
                   color:white;
                   padding:12px 25px;
                   text-decoration:none;
                   margin-right:10px;
                   display:inline-block;
                   width:120px;
                   text-align:center;
               ">
                {{ __('messages.login') }}
            </a>

            <a href="{{ route('register') }}"
               style="
                   background-color:#198754;
                   color:white;
                   padding:12px 25px;
                   text-decoration:none;
                   display:inline-block;
                   width:120px;
                   text-align:center;
               ">
                {{ __('messages.register') }}
            </a>

        </div>

    </div>

</body>
</html>