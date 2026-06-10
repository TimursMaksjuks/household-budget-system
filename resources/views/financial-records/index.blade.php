<h1>{{ __('messages.financial_records') }}</h1>

<a href="{{ route('financial-records.create') }}"> {{ __('messages.add_record') }} </a>

<br>
<br>

<table border="1">

<tr>
    <th>{{ __('messages.date') }}</th>
    <th>{{ __('messages.type') }}</th>
    <th>{{ __('messages.category') }}</th>
    <th>{{ __('messages.description') }}</th>
    <th>{{ __('messages.amount') }}</th>
    <th>{{ __('messages.actions') }}</th>
</tr>

@foreach($records as $record)

    <tr>
        <td>{{ $record->date }}</td>
        <td>
    @if($record->record_type === 'income')
        {{ __('messages.income') }}
    @else
        {{ __('messages.expense') }}
    @endif
        </td>
        <td>{{ $record->category->name }}</td>
        <td>{{ $record->description }}</td>
        <td>{{ $record->amount }}</td>

        <td>

            <a href="{{ route('financial-records.edit', $record) }}"> {{ __('messages.edit') }} </a>

            <form method="POST"
                  action="{{ route('financial-records.destroy', $record) }}"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit"> {{ __('messages.delete') }} </button>

            </form>

        </td>
    </tr>

@endforeach


</table>