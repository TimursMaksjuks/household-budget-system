<x-guest-layout>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div style="text-align:center; margin-bottom:20px;">
    <a href="{{ url('/') }}"
       style="
            color:#6c757d;
            text-decoration:none;
       ">
        {{ __('messages.back_to_home') }}
    </a>
</div>

<h2 style="
    text-align:center;
    margin-bottom:30px;
    font-size:42px;
    font-weight:bold;
">
    {{ __('messages.login') }}
</h2>

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <div style="margin-bottom:20px;">

            <label style="
                display:block;
                margin-bottom:8px;
                font-weight:bold;
            ">
                {{ __('messages.email') }}
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                style="
                    width:100%;
                    padding:10px;
                    border:1px solid #cccccc;
                "
            >

            @error('email')
                <p style="color:red; margin-top:5px;">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <div style="margin-bottom:20px;">

            <label style="
                display:block;
                margin-bottom:8px;
                font-weight:bold;
            ">
                {{ __('messages.password') }}
            </label>

            <input
                type="password"
                name="password"
                required
                autocomplete="current-password"
                style="
                    width:100%;
                    padding:10px;
                    border:1px solid #cccccc;
                "
            >

            @error('password')
                <p style="color:red; margin-top:5px;">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <div style="margin-bottom:20px;">

            <label>

                <input type="checkbox" name="remember">

                {{ __('messages.remember_me') }}

            </label>

        </div>

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
        ">

            @if (Route::has('password.request'))

                <a href="{{ route('password.request') }}"
                   style="
                       color:#6c757d;
                       text-decoration:none;
                   ">
                    {{ __('messages.forgot_password') }}
                </a>

            @endif

            <button
                type="submit"
                style="
                    background-color:#0d6efd;
                    color:white;
                    border:none;
                    padding:10px 20px;
                    cursor:pointer;
                    width:140px;
                ">
                {{ __('messages.login') }}
            </button>

        </div>

    </form>

</x-guest-layout>