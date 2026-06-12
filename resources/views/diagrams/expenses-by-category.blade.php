<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.expenses_by_category') }}
        </h2>
    </x-slot>

    @php

        $labels = [];
        $data = [];

        foreach ($expenses as $expense) {

            $labels[] = $expense->category->name;
            $data[] = $expense->total;

        }

    @endphp

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <h3>{{ __('messages.expenses_by_category') }}</h3>

                    <br>

                    <div style="margin-bottom:20px;">

                        <a href="{{ url('/diagrams/monthly-income-expenses') }}"
                           style="
                               background-color:#198754;
                               color:white;
                               padding:10px 15px;
                               text-decoration:none;
                               margin-right:10px;
                           ">
                            {{ __('messages.monthly_income_expenses') }}
                        </a>

                        <a href="{{ route('dashboard') }}"
                           style="
                               background-color:#6c757d;
                               color:white;
                               padding:10px 15px;
                               text-decoration:none;
                           ">
                            {{ __('messages.back') }}
                        </a>

                    </div>

                    <div style="
                        width:350px;
                        height:350px;
                        margin:auto;
                    ">
                        <canvas id="expenseChart"></canvas>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const ctx = document.getElementById('expenseChart');

        new Chart(ctx, {

            type: 'pie',

            data: {

                labels: @json($labels),

                datasets: [{

                    label: '{{ __('messages.expense') }}',

                    data: @json($data)

                }]

            }

        });

    </script>

</x-app-layout>