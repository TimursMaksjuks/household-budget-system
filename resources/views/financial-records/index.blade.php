<h1>Financial Records</h1>

<a href="{{ route('financial-records.create') }}"> Add Record </a>

<table border="1">
    
<tr>
    <th>Date</th>
    <th>Type</th>
    <th>Category</th>
    <th>Description</th>
    <th>Amount</th>
</tr>

@foreach($records as $record)

<tr>
    <td>{{ $record->date }}</td>
    <td>{{ $record->record_type }}</td>
    <td>{{ $record->category->name }}</td>
    <td>{{ $record->description }}</td>
    <td>{{ $record->amount }}</td>
</tr>

@endforeach
</table>