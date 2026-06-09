<h1>User Panel</h1>
@foreach($users as $user)

<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->surname }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role }}</td>
    <td>{{ $user->is_blocked ? 'Yes' : 'No' }}</td>
</tr>
<br><br>

@endforeach

<p>Administrator access granted</p>