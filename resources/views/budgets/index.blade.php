<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.budgets') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto">

            <div style="margin-bottom:20px;">

                <a href="{{ route('budgets.create') }}"
                   style="
                       background-color:#198754;
                       color:white;
                       padding:10px 15px;
                       text-decoration:none;
                       margin-right:10px;
                   ">
                    {{ __('messages.add_budget') }}
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

            <table style="
                width:100%;
                border-collapse:collapse;
                background-color:white;
            ">

                <thead>

                    <tr style="background-color:#f2f2f2;">

                        <th style="border:1px solid #ccc; padding:10px;">
                            {{ __('messages.period') }}
                        </th>

                        <th style="border:1px solid #ccc; padding:10px;">
                            {{ __('messages.category') }}
                        </th>

                        <th style="border:1px solid #ccc; padding:10px;">
                            {{ __('messages.limit_amount') }}
                        </th>

                        <th style="border:1px solid #ccc; padding:10px;">
                            {{ __('messages.spent') }}

                        </th>

                        <th style="border:1px solid #ccc; padding:10px;">
                            {{ __('messages.remainder') }}

                        </th>

                        <th style="border:1px solid #ccc; padding:10px;">
                            {{ __('messages.actions') }}
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($budgets as $budget)

                        <tr>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ $budget->period }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ $budget->category->name }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ number_format($budget->limit_amount, 2) }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ number_format($budget->spent, 2) }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ number_format($budget->remaining, 2) }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">

                                <a href="{{ route('budgets.edit', $budget) }}"
                                   style="
                                       background-color:#0d6efd;
                                       color:white;
                                       padding:6px 12px;
                                       text-decoration:none;
                                       display:inline-block;
                                       width:100px;
                                       text-align:center;
                                   ">
                                    {{ __('messages.edit') }}
                                </a>

                                <form method="POST"
                                      action="{{ route('budgets.destroy', $budget) }}"
                                      style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            style="
                                                background-color:#dc3545;
                                                color:white;
                                                border:none;
                                                padding:6px 12px;
                                                cursor:pointer;
                                                width:100px;
                                            ">
                                        {{ __('messages.delete') }}
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>
    </div>

</x-app-layout>