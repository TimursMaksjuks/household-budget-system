<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.all_financial_records') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">

            <div style="margin-bottom:20px;">

                <a href="{{ route('admin.index') }}"
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

                        <th style="border:1px solid #ccc;padding:10px;">
                            {{ __('messages.user') }}
                        </th>

                        <th style="border:1px solid #ccc;padding:10px;">
                            {{ __('messages.date') }}
                        </th>

                        <th style="border:1px solid #ccc;padding:10px;">
                            {{ __('messages.type') }}
                        </th>

                        <th style="border:1px solid #ccc;padding:10px;">
                            {{ __('messages.category') }}
                        </th>

                        <th style="border:1px solid #ccc;padding:10px;">
                            {{ __('messages.description') }}
                        </th>

                        <th style="border:1px solid #ccc;padding:10px;">
                            {{ __('messages.amount') }}
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($records as $record)

                        <tr>

                            <td style="border:1px solid #ccc;padding:10px;">
                                {{ $record->user->name }}
                                {{ $record->user->surname }}
                            </td>

                            <td style="border:1px solid #ccc;padding:10px;">
                                {{ \Carbon\Carbon::parse($record->date)->format('d/m/Y') }}
                            </td>

                            <td style="border:1px solid #ccc;padding:10px;">

                                @if($record->record_type === 'income')
                                    {{ __('messages.income') }}
                                @else
                                    {{ __('messages.expense') }}
                                @endif

                            </td>

                            <td style="border:1px solid #ccc;padding:10px;">
                                {{ $record->category->name }}
                            </td>

                            <td style="border:1px solid #ccc;padding:10px;">
                                {{ $record->description }}
                            </td>

                            <td style="border:1px solid #ccc;padding:10px;">
                                {{ $record->amount }} €
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>
    </div>

</x-app-layout>