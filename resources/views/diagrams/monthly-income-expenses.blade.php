<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight"> Monthly Income and Expenses </h2>
</x-slot>

<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6 text-gray-900">

                <h3>Income and Expenses by Month</h3>

                <br>

                <div style="width: 800px; height: 500px; margin: auto;">
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
                    label: 'Income',
                    data: @json($incomeValues)
                },

                {
                    label: 'Expenses',
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