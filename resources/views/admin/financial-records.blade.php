<h1>All Financial Records</h1>

<br>

<table border="1">

    <tr>
        <th>User</th>
        <th>Date</th>
        <th>Type</th>
        <th>Category</th>
        <th>Description</th>
        <th>Amount</th>
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
                {{ $record->record_type }}
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