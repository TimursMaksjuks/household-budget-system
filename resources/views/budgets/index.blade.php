<h1>{{ __('messages.budgets') }}</h1>

<a href="{{ route('budgets.create') }}"> {{ __('messages.add_budget') }} </a>

<br>

<br>

<table border="1">

<tr>
    <th>{{ __('messages.period') }}</th>
    <th>{{ __('messages.category') }}</th>
    <th>{{ __('messages.limit_amount') }}</th>
    <th>{{ __('messages.actions') }}</th>
</tr>

@foreach($budgets as $budget)

    <tr>
        <td>{{ $budget->period }}</td>
        <td>{{ $budget->category->name }}</td>
        <td>{{ $budget->limit_amount }}</td>

        <td>

            <a href="{{ route('budgets.edit', $budget) }}"> {{ __('messages.edit') }} </a>

            <form method="POST" action="{{ route('budgets.destroy', $budget) }}" style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit"> {{ __('messages.delete') }} </button>

            </form>

        </td>

    </tr>

@endforeach


</table>