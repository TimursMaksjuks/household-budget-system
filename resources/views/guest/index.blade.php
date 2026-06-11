<h1>{{ __('messages.welcome_title') }}</h1>
<p> {{ __('messages.welcome_description') }} </p>

<h3>{{ __('messages.features') }}</h3>

<ul>
    <li>{{ __('messages.feature_1') }}</li>
    <li>{{ __('messages.feature_2') }}</li>
    <li>{{ __('messages.feature_3') }}</li>
    <li>{{ __('messages.feature_4') }}</li>
</ul>

<br>

<a href="{{ route('login') }}"> {{ __('messages.login') }} </a>

<br><br>

<a href="{{ route('register') }}"> {{ __('messages.register') }} </a>