<x-guest-layout>

    <div style="text-align:center; margin-bottom:20px;">
        <a href="{{ url('/') }}"
           style="
                color:#6c757d;
                text-decoration:none;
                font-size:14px;
           ">
             {{ __('messages.back_to_home') }}
        </a>
    </div>

    <h2 style="
        text-align:center;
        margin-bottom:30px;
        font-size:42px;
        font-weight:bold;
        color:#1f2937;
    ">
        {{ __('messages.register') }}
    </h2>

    <form method="POST" action="{{ route('register') }}">

        @csrf

        <div style="margin-bottom:15px;">

            <label style="
                display:block;
                margin-bottom:8px;
                font-weight:bold;
            ">
                {{ __('messages.name') }}
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                style="
                    width:100%;
                    padding:10px;
                    border:1px solid #cccccc;
                "
            >

            @error('name')
                <p style="color:red; margin-top:5px;">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <div style="margin-bottom:15px;">

            <label style="
                display:block;
                margin-bottom:8px;
                font-weight:bold;
            ">
                {{ __('messages.surname') }}
            </label>

            <input
                type="text"
                name="surname"
                value="{{ old('surname') }}"
                required
                style="
                    width:100%;
                    padding:10px;
                    border:1px solid #cccccc;
                "
            >

            @error('surname')
                <p style="color:red; margin-top:5px;">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <div style="margin-bottom:15px;">

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

        <div style="margin-bottom:15px;">

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

        <div style="margin-bottom:25px;">

            <label style="
                display:block;
                margin-bottom:8px;
                font-weight:bold;
            ">
                {{ __('messages.confirm_password') }}
            </label>

            <input
                type="password"
                name="password_confirmation"
                required
                style="
                    width:100%;
                    padding:10px;
                    border:1px solid #cccccc;
                "
            >

        </div>

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
        ">

            <a href="{{ route('login') }}"
               style="
                    color:#6c757d;
                    text-decoration:none;
               ">
                {{ __('messages.already_registered') }}
            </a>

            <button
                type="submit"
                style="
                    background:#0d6efd;
                    color:white;
                    border:none;
                    padding:10px 20px;
                    cursor:pointer;
                    width:160px;
                ">
                {{ __('messages.register') }}
            </button>

        </div>

    </form>

</x-guest-layout>