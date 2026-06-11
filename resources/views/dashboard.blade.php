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

                    <h2 class="text-lg font-semibold mb-4">
                        {{ __('messages.household_budget_dashboard') }}
                    </h2>

                    <p>{{ __('messages.total_income') }}: {{ $totalIncome }} €</p>

                    <p>{{ __('messages.total_expenses') }}: {{ $totalExpenses }} €</p>

                    <p>{{ __('messages.current_balance') }}: {{ $balance }} €</p>

                    <p>{{ __('messages.financial_records_count') }}: {{ $recordsCount }}</p>

                    <p>{{ __('messages.budgets_count') }}: {{ $budgetsCount }}</p>

                    <div class="mt-6 flex gap-4">

                        <p>
    <a href="{{ route('diagrams.expenses-by-category') }}"
       style="background:#aaaaaa;color:white;padding:5px 10px;text-decoration:none;border-radius:5px;">
        {{ __('messages.expenses_by_category') }}
    </a>
</p>

<br>

<p>
    <a href="{{ route('diagrams.monthly-income-expenses') }}"
       style="background:#aaaaaa;color:white;padding:5px 10px;text-decoration:none;border-radius:5px;">
        {{ __('messages.monthly_income_expenses') }}
    </a>
</p>

                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>