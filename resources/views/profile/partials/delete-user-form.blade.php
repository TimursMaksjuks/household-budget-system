<section class="space-y-6">

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('messages.delete_account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('messages.delete_account_description') }}
        </p>
    </header>

    <form method="POST" action="{{ route('profile.destroy') }}">

        @csrf
        @method('DELETE')

        <div style="margin-top:20px;">
            <label>
                {{ __('messages.password') }}
            </label>

            <br><br>

            <input
                type="password"
                name="password"
                required
                style="
                    border:1px solid #ccc;
                    padding:10px;
                    width:300px;
                "
            >
        </div>

        <br>

        <button
            type="submit"
            style="
                background-color:#dc3545;
                color:white;
                border:none;
                padding:10px 20px;
                cursor:pointer;
            "
        >
            {{ __('messages.delete_account') }}
        </button>

    </form>

</section>