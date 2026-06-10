@if(session('success'))

    <div style="
        background:#d4edda;
        color:#155724;
        padding:10px;
        margin-bottom:15px;
        border:1px solid #c3e6cb;
    ">
        {{ session('success') }}
    </div>

@endif



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