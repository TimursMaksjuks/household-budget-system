<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.financial_records') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto">

            <div style="margin-bottom:20px;">

                <a href="{{ route('financial-records.create') }}"
                   style="
                       background-color:#198754;
                       color:white;
                       padding:10px 15px;
                       text-decoration:none;
                       margin-right:10px;
                   ">
                    {{ __('messages.add_record') }}
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
                            {{ __('messages.date') }}
                        </th>

                        <th style="border:1px solid #ccc; padding:10px;">
                            {{ __('messages.type') }}
                        </th>

                        <th style="border:1px solid #ccc; padding:10px;">
                            {{ __('messages.category') }}
                        </th>

                        <th style="border:1px solid #ccc; padding:10px;">
                            {{ __('messages.description') }}
                        </th>

                        <th style="border:1px solid #ccc; padding:10px;">
                            {{ __('messages.amount') }}
                        </th>

                        <th style="border:1px solid #ccc; padding:10px;">
                            {{ __('messages.actions') }}
                        </th>

                    </tr>
                </thead>

                <tbody>

                    @foreach($records as $record)

                        <tr>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ $record->date }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">

                                @if($record->record_type === 'income')

                                    <span style="color:green; font-weight:bold;">
                                        {{ __('messages.income') }}
                                    </span>

                                @else

                                    <span style="color:red; font-weight:bold;">
                                        {{ __('messages.expense') }}
                                    </span>

                                @endif

                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ $record->category->name }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ $record->description }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">
                                {{ $record->amount }}
                            </td>

                            <td style="border:1px solid #ccc; padding:10px;">

                                <a href="{{ route('financial-records.edit', $record) }}"
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
                                      action="{{ route('financial-records.destroy', $record) }}"
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