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




<h1>{{ __('messages.admin_panel') }}</h1>

<table border="1">

<tr>
    <th>ID</th>
    <th>{{ __('messages.name') }}</th>
    <th>{{ __('messages.surname') }}</th>
    <th>{{ __('messages.email') }}</th>
    <th>{{ __('messages.role') }}</th>
    <th>{{ __('messages.blocked') }}</th>
    <th>{{ __('messages.actions') }}</th>
</tr>

@foreach($users as $user)

    <tr>

        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->surname }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>

        <td>
            {{ $user->is_blocked ? __('messages.yes') : __('messages.no') }}
        </td>

        <td>

            @if($user->id !== Auth::id())

            @if(!$user->is_blocked)

        <form method="POST" action="{{ route('admin.users.block', $user) }}">
            @csrf
            @method('PATCH')

            <button type="submit"> {{ __('messages.block') }} </button>
        </form>

    @else

        <form method="POST" action="{{ route('admin.users.unblock', $user) }}">
            @csrf
            @method('PATCH')

            <button type="submit"> {{ __('messages.unblock') }} </button>
        </form>

    @endif

@endif

<br>

@if($user->role === 'user')

    <form method="POST" action="{{ route('admin.users.make-admin', $user) }}">

        @csrf
        @method('PATCH')

        <button type="submit"> {{ __('messages.make_admin') }} </button>

    </form>

@elseif($user->role === 'admin' && $user->id !== auth()->id())

    <form method="POST" action="{{ route('admin.users.make-user', $user) }}">

        @csrf
        @method('PATCH')

        <button type="submit"> {{ __('messages.make_user') }} </button>

    </form>

@endif
        </td>

    </tr>

@endforeach


</table>