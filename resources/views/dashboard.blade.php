<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.overview') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <h2 class="text-lg font-semibold mb-6">
                        {{ __('messages.household_budget_dashboard') }}
                    </h2>

                    <div style="line-height:2;">

                        <p>
                            <strong>{{ __('messages.total_income') }}:</strong>
                            {{ $totalIncome }} €
                        </p>

                        <p>
                            <strong>{{ __('messages.total_expenses') }}:</strong>
                            {{ $totalExpenses }} €
                        </p>

                        <p>
                            <strong>{{ __('messages.current_balance') }}:</strong>
                            {{ $balance }} €
                        </p>

                        <p>
                            <strong>{{ __('messages.financial_records_count') }}:</strong>
                            {{ $recordsCount }}
                        </p>

                        <p>
                            <strong>{{ __('messages.budgets_count') }}:</strong>
                            {{ $budgetsCount }}
                        </p>

                    </div>

                    <div style="margin-top:25px;">

                        <a href="{{ route('diagrams.expenses-by-category') }}"
                           style="
                               background-color:#0d6efd;
                               color:white;
                               padding:10px 15px;
                               text-decoration:none;
                               margin-right:10px;
                           ">
                            {{ __('messages.expenses_by_category') }}
                        </a>

                        <a href="{{ route('diagrams.monthly-income-expenses') }}"
                           style="
                               background-color:#198754;
                               color:white;
                               padding:10px 15px;
                               text-decoration:none;
                           ">
                            {{ __('messages.monthly_income_expenses') }}
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>