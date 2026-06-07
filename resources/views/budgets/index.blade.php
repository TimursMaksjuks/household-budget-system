<h1>Budgets</h1>

<a href="{{ route('budgets.create') }}"> Add Budget </a>

<br>
<br>

<table border="1">

<tr>
    <th>Period</th>
    <th>Category</th>
    <th>Limit Amount</th>
</tr>

@foreach($budgets as $budget)

    <tr>
        <td>{{ $budget->period }}</td>
        <td>{{ $budget->category->name }}</td>
        <td>{{ $budget->limit_amount }}</td>
    </tr>

@endforeach


</table>