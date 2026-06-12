<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.monthly_income_expenses') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <h3>{{ __('messages.monthly_income_expenses') }}</h3>

                    <br>

                    <div style="margin-bottom:20px;">

                        <a href="{{ url('/diagrams/expenses-by-category') }}"
                           style="
                               background-color:#0d6efd;
                               color:white;
                               padding:10px 15px;
                               text-decoration:none;
                               margin-right:10px;
                           ">
                            {{ __('messages.expenses_by_category') }}
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
                        width:700px;
                        height:400px;
                        margin:auto;
                    ">
                        <canvas id="monthlyChart"></canvas>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const ctx = document.getElementById('monthlyChart');

        new Chart(ctx, {

            type: 'bar',

            data: {

                labels: @json($months),

                datasets: [

                    {
                        label: '{{ __('messages.income') }}',
                        data: @json($incomeValues)
                    },

                    {
                        label: '{{ __('messages.expense') }}',
                        data: @json($expenseValues)
                    }

                ]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                scales: {

                    y: {
                        beginAtZero: true
                    }

                }

            }

        });

    </script>

</x-app-layout>