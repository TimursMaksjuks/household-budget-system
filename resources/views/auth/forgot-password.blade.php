<x-guest-layout>

    <h2 style="
        text-align:center;
        margin-bottom:25px;
        font-size:28px;
        font-weight:bold;
        color:#1f2937;
    ">
        {{ __('messages.forgot_password') }}
    </h2>

    <div style="
        margin-bottom:20px;
        padding:15px;
        background:#f8f9fa;
        border:1px solid #dee2e6;
        color:#495057;
    ">
        {{ __('messages.forgot_password_description') }}
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">

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
                style="
                    width:100%;
                    padding:10px;
                    border:1px solid #cccccc;
                "
            >

            @error('email')
                <p style="
                    color:red;
                    margin-top:5px;
                ">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
        ">

            <a href="{{ route('login') }}"
               style="
                   background:#6c757d;
                   color:white;
                   text-decoration:none;
                   padding:10px 20px;
                   display:inline-block;
                   width:140px;
                   text-align:center;
               ">
                {{ __('messages.back') }}
            </a>

            <button
                type="submit"
                style="
                    background:#0d6efd;
                    color:white;
                    border:none;
                    padding:10px 20px;
                    cursor:pointer;
                    width:220px;
                ">
                {{ __('messages.email_password_reset_link') }}
            </button>

        </div>

    </form>

</x-guest-layout>