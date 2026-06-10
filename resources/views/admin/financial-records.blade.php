<h1>{{ __('messages.all_financial_records') }}</h1>

<br>

<table border="1">

    <tr>
        <th>{{ __('messages.user') }}</th>
        <th>{{ __('messages.date') }}</th>
        <th>{{ __('messages.type') }}</th>
        <th>{{ __('messages.category') }}</th>
        <th>{{ __('messages.description') }}</th>
        <th>{{ __('messages.amount') }}</th>
    </tr>

    @foreach($records as $record)

        <tr>

            <td>
                {{ $record->user->name }}
                {{ $record->user->surname }}
            </td>

            <td>
                {{ $record->date }}
            </td>

            <td>
    @if($record->record_type === 'income')
        {{ __('messages.income') }}
    @else
        {{ __('messages.expense') }}
    @endif
            </td>

            <td>
                {{ $record->category->name }}
            </td>

            <td>
                {{ $record->description }}
            </td>

            <td>
                {{ $record->amount }}
            </td>

        </tr>

    @endforeach

</table>