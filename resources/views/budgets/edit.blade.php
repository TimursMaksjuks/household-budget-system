<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.edit_budget') }}
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
                  action="{{ route('budgets.update', $budget) }}"
                  style="
                    background-color:white;
                    padding:20px;
                    border:1px solid #ccc;
                  ">

                @csrf
                @method('PUT')

                <div style="margin-bottom:15px;">
                    <label>{{ __('messages.limit_amount') }}</label>
                    <br><br>

                    <input
                        type="number"
                        step="0.01"
                        name="limit_amount"
                        value="{{ old('limit_amount', $budget->limit_amount) }}"
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

    @php
        $selectedYear = explode('-', old('period', $budget->period))[0];
        $selectedMonth = explode('-', old('period', $budget->period))[1];
    @endphp

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

            <option value="01" {{ $selectedMonth == '01' ? 'selected' : '' }}>Janvāris</option>
            <option value="02" {{ $selectedMonth == '02' ? 'selected' : '' }}>Februāris</option>
            <option value="03" {{ $selectedMonth == '03' ? 'selected' : '' }}>Marts</option>
            <option value="04" {{ $selectedMonth == '04' ? 'selected' : '' }}>Aprīlis</option>
            <option value="05" {{ $selectedMonth == '05' ? 'selected' : '' }}>Maijs</option>
            <option value="06" {{ $selectedMonth == '06' ? 'selected' : '' }}>Jūnijs</option>
            <option value="07" {{ $selectedMonth == '07' ? 'selected' : '' }}>Jūlijs</option>
            <option value="08" {{ $selectedMonth == '08' ? 'selected' : '' }}>Augusts</option>
            <option value="09" {{ $selectedMonth == '09' ? 'selected' : '' }}>Septembris</option>
            <option value="10" {{ $selectedMonth == '10' ? 'selected' : '' }}>Oktobris</option>
            <option value="11" {{ $selectedMonth == '11' ? 'selected' : '' }}>Novembris</option>
            <option value="12" {{ $selectedMonth == '12' ? 'selected' : '' }}>Decembris</option>

        @else

            <option value="01" {{ $selectedMonth == '01' ? 'selected' : '' }}>January</option>
            <option value="02" {{ $selectedMonth == '02' ? 'selected' : '' }}>February</option>
            <option value="03" {{ $selectedMonth == '03' ? 'selected' : '' }}>March</option>
            <option value="04" {{ $selectedMonth == '04' ? 'selected' : '' }}>April</option>
            <option value="05" {{ $selectedMonth == '05' ? 'selected' : '' }}>May</option>
            <option value="06" {{ $selectedMonth == '06' ? 'selected' : '' }}>June</option>
            <option value="07" {{ $selectedMonth == '07' ? 'selected' : '' }}>July</option>
            <option value="08" {{ $selectedMonth == '08' ? 'selected' : '' }}>August</option>
            <option value="09" {{ $selectedMonth == '09' ? 'selected' : '' }}>September</option>
            <option value="10" {{ $selectedMonth == '10' ? 'selected' : '' }}>October</option>
            <option value="11" {{ $selectedMonth == '11' ? 'selected' : '' }}>November</option>
            <option value="12" {{ $selectedMonth == '12' ? 'selected' : '' }}>December</option>

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

            <option
                value="{{ $year }}"
                {{ $selectedYear == $year ? 'selected' : '' }}
            >
                {{ $year }}
            </option>

        @endfor

    </select>

    <input
        type="hidden"
        name="period"
        id="period"
        value="{{ old('period', $budget->period) }}"
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

                            <option
                                value="{{ $category->id }}"
                                {{ $budget->category_id == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <button type="submit"
                        style="
                            background-color:#0d6efd;
                            color:white;
                            border:none;
                            width:150px;
                            height:50px;
                            cursor:pointer;
                            margin-right:10px;
                        ">
                    {{ __('messages.update_budget') }}
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