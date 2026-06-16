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

    <select
        id="month"
        style="
            width:145px;
            padding:8px;
            border:1px solid #ccc;
            margin-right:10px;
        "
    >

        @if(app()->getLocale() === 'lv')

            <option value="01">Janvāris</option>
            <option value="02">Februāris</option>
            <option value="03">Marts</option>
            <option value="04">Aprīlis</option>
            <option value="05">Maijs</option>
            <option value="06">Jūnijs</option>
            <option value="07">Jūlijs</option>
            <option value="08">Augusts</option>
            <option value="09">Septembris</option>
            <option value="10">Oktobris</option>
            <option value="11">Novembris</option>
            <option value="12">Decembris</option>

        @else

            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>

        @endif

    </select>

    <select
        id="year"
        style="
            width:145px;
            padding:8px;
            border:1px solid #ccc;
        "
    >

        @for($year = date('Y') - 5; $year <= date('Y') + 10; $year++)

            <option value="{{ $year }}">
                {{ $year }}
            </option>

        @endfor

    </select>

    <input
        type="hidden"
        name="period"
        id="period"
    >

</div>

<script>

    function updatePeriod() {

        let month = document.getElementById('month').value;
        let year = document.getElementById('year').value;

        document.getElementById('period').value =
            year + '-' + month;
    }

    document.getElementById('month')
        .addEventListener('change', updatePeriod);

    document.getElementById('year')
        .addEventListener('change', updatePeriod);

    updatePeriod();

</script>
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