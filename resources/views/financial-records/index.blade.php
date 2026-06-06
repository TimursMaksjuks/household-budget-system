<h1>Financial Records</h1>

<a href="{{ route('financial-records.create') }}"> Add Record </a>

<br>
<br>

<table border="1">

<tr>
    <th>Date</th>
    <th>Type</th>
    <th>Category</th>
    <th>Description</th>
    <th>Amount</th>
    <th>Actions</th>
</tr>

@foreach($records as $record)

    <tr>
        <td>{{ $record->date }}</td>
        <td>{{ $record->record_type }}</td>
        <td>{{ $record->category->name }}</td>
        <td>{{ $record->description }}</td>
        <td>{{ $record->amount }}</td>

        <td>

            <a href="{{ route('financial-records.edit', $record) }}"> Edit </a>

            <form method="POST"
                  action="{{ route('financial-records.destroy', $record) }}"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit"> Delete </button>

            </form>

        </td>
    </tr>

@endforeach


</table>