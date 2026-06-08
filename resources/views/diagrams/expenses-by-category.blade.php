<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> Expenses by Category </h2>
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

                    <h3>Expense Distribution by Category</h3>

                    <br>

                    <div style="width: 450px; height: 450px; margin: auto;">
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

                    label: 'Expenses',

                    data: @json($data)

                }]

            }

        });

    </script>

</x-app-layout>