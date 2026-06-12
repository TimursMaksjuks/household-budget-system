<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.add_budget') }}
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

            <form method="POST"
                  action="{{ route('budgets.store') }}"
                  style="
                    background-color:white;
                    padding:20px;
                    border:1px solid #ccc;
                  ">

                @csrf

                <div style="margin-bottom:15px;">
                    <label>{{ __('messages.limit_amount') }}</label>
                    <br><br>

                    <input
                        type="number"
                        step="0.01"
                        name="limit_amount"
                        value="{{ old('limit_amount') }}"
                        style="
                            width:300px;
                            padding:8px;
                            border:1px solid #ccc;
                        "
                    >
                </div>

                <div style="margin-bottom:15px;">
                    <label>{{ __('messages.period') }}</label>
                    <br><br>

                    <input
                        type="text"
                        name="period"
                        value="{{ old('period') }}"
                        placeholder="June 2026"
                        style="
                            width:300px;
                            padding:8px;
                            border:1px solid #ccc;
                        "
                    >
                </div>

                <div style="margin-bottom:15px;">
                    <label>{{ __('messages.category') }}</label>
                    <br><br>

                    <select
                        name="category_id"
                        style="
                            width:300px;
                            padding:8px;
                            border:1px solid #ccc;
                        "
                    >
                        @foreach($categories as $category)

                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <button type="submit"
                        style="
                            background-color:#198754;
                            color:white;
                            border:none;
                            width:150px;
                            height:50px;
                            cursor:pointer;
                            margin-right:10px;
                        ">
                    {{ __('messages.save_budget') }}
                </button>

                <a href="{{ route('budgets.index') }}"
                   style="
                       background-color:#6c757d;
                       color:white;
                       text-decoration:none;
                       display:inline-flex;
                       align-items:center;
                       justify-content:center;
                       width:150px;
                       height:50px;
                       box-sizing:border-box;
                   ">
                    {{ __('messages.back') }}
                </a>

            </form>

        </div>
    </div>

</x-app-layout>