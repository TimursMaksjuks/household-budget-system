<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.create_category') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto">

            @if($errors->any())
                <div style="
                    background-color:#f8d7da;
                    color:#721c24;
                    border:1px solid #f5c6cb;
                    padding:10px;
                    margin-bottom:15px;
                ">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('categories.store') }}"
                  style="
                    background-color:white;
                    padding:20px;
                    border:1px solid #ccc;
                  ">

                @csrf

                <div style="margin-bottom:15px;">

                    <label>
                        {{ __('messages.category_name') }}
                    </label>

                    <br><br>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        style="
                            width:300px;
                            padding:8px;
                            border:1px solid #ccc;
                        "
                    >

                </div>

                <button type="submit"
                        style="
                            background-color:#198754;
                            color:white;
                            border:none;
                            padding:10px 15px;
                            cursor:pointer;
                            margin-right:10px;
                        ">
                    {{ __('messages.create_category') }}
                </button>

                <a href="{{ route('categories.index') }}"
                   style="
                       background-color:#6c757d;
                       color:white;
                       padding:10px 15px;
                       text-decoration:none;
                   ">
                    {{ __('messages.back') }}
                </a>

            </form>

        </div>
    </div>

</x-app-layout>