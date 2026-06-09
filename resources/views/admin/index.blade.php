<h1>Admin Panel</h1>

<table border="1">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Surname</th>
    <th>Email</th>
    <th>Role</th>
    <th>Blocked</th>
    <th>Actions</th>
</tr>

@foreach($users as $user)

    <tr>

        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->surname }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>

        <td>
            {{ $user->is_blocked ? 'Yes' : 'No' }}
        </td>

        <td>

            @if($user->id !== Auth::id())

            @if(!$user->is_blocked)

        <form method="POST" action="{{ route('admin.users.block', $user) }}">
            @csrf
            @method('PATCH')

            <button type="submit"> Block </button>
        </form>

    @else

        <form method="POST" action="{{ route('admin.users.unblock', $user) }}">
            @csrf
            @method('PATCH')

            <button type="submit"> Unblock </button>
        </form>

    @endif

@endif

<br>

@if($user->role === 'user')

    <form method="POST" action="{{ route('admin.users.make-admin', $user) }}">

        @csrf
        @method('PATCH')

        <button type="submit"> Make Admin </button>

    </form>

@elseif($user->role === 'admin' && $user->id !== auth()->id())

    <form method="POST" action="{{ route('admin.users.make-user', $user) }}">

        @csrf
        @method('PATCH')

        <button type="submit"> Make User </button>

    </form>

@endif
        </td>

    </tr>

@endforeach


</table>