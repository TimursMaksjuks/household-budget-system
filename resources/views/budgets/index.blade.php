<h1>Budgets</h1>

<a href="{{ route('budgets.create') }}"> Add Budget </a>

<br>

<br>

<table border="1">

<tr>
    <th>Period</th>
    <th>Category</th>
    <th>Limit Amount</th>
    <th>Actions</th>
</tr>

@foreach($budgets as $budget)

    <tr>
        <td>{{ $budget->period }}</td>
        <td>{{ $budget->category->name }}</td>
        <td>{{ $budget->limit_amount }}</td>

        <td>

            <a href="{{ route('budgets.edit', $budget) }}"> Edit </a>

            <form method="POST" action="{{ route('budgets.destroy', $budget) }}" style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit"> Delete </button>

            </form>

        </td>

    </tr>

@endforeach


</table>