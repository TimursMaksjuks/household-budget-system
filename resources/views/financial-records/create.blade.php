<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.create_finance_record') }}
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
                  action="{{ route('financial-records.store') }}"
                  style="
                    background-color:white;
                    padding:20px;
                    border:1px solid #ccc;
                  ">

                @csrf

                <div style="margin-bottom:15px;">
                    <label>{{ __('messages.amount') }}</label>
                    <br><br>

                    <input
                        type="number"
                        step="0.01"
                        name="amount"
                        value="{{ old('amount') }}"
                        style="
                            width:300px;
                            padding:8px;
                            border:1px solid #ccc;
                        "
                    >
                </div>

                <div style="margin-bottom:15px;">
                    <label>{{ __('messages.date') }}</label>
                    <br><br>

                    <input
                        type="date"
                        name="date"
                        value="{{ old('date') }}"
                        style="
                            width:300px;
                            padding:8px;
                            border:1px solid #ccc;
                        "
                    >
                </div>

                <div style="margin-bottom:15px;">
                    <label>{{ __('messages.description') }}</label>
                    <br><br>

                    <textarea
                        name="description"
                        rows="4"
                        style="
                            width:300px;
                            padding:8px;
                            border:1px solid #ccc;
                        "
                    >{{ old('description') }}</textarea>
                </div>

                <div style="margin-bottom:15px;">
                    <label>{{ __('messages.type') }}</label>
                    <br><br>

                    <select
                        name="record_type"
                        style="
                            width:300px;
                            padding:8px;
                            border:1px solid #ccc;
                        "
                    >
                        <option value="income">
                            {{ __('messages.income') }}
                        </option>

                        <option value="expense">
                            {{ __('messages.expense') }}
                        </option>
                    </select>
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
                            padding:10px 15px;
                            cursor:pointer;
                            width:120px;
                            margin-right:10px;
                        ">
                    {{ __('messages.save') }}
                </button>

                <a href="{{ route('financial-records.index') }}"
                   style="
                       background-color:#6c757d;
                       color:white;
                       padding:10px 15px;
                       text-decoration:none;
                       display:inline-block;
                       width:120px;
                       text-align:center;
                       box-sizing:border-box;
                   ">
                    {{ __('messages.back') }}
                </a>

            </form>

        </div>
    </div>

</x-app-layout>