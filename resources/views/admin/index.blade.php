<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.admin_panel') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">

            <div style="margin-bottom:20px;">


                <a href="{{ route('admin.financial-records') }}"
   style="
       background-color:#0d6efd;
       color:white;
       padding:10px 15px;
       text-decoration:none;
       margin-right:10px;
   ">
    {{ __('messages.all_financial_records') }}
</a>

                <a href="{{ route('dashboard') }}"
                   style="
                       background-color:#6c757d;
                       color:white;
                       padding:10px 15px;
                       text-decoration:none;
                   ">
                    {{ __('messages.back') }}
                </a>

            </div>

            <table style="
                width:100%;
                border-collapse:collapse;
                background-color:white;
            ">

                <thead>

                    <tr style="background-color:#f2f2f2;">

                        <th style="border:1px solid #ccc;padding:10px;">ID</th>

                        <th style="border:1px solid #ccc;padding:10px;">
                            {{ __('messages.name') }}
                        </th>

                        <th style="border:1px solid #ccc;padding:10px;">
                            {{ __('messages.surname') }}
                        </th>

                        <th style="border:1px solid #ccc;padding:10px;">
                            {{ __('messages.email') }}
                        </th>

                        <th style="border:1px solid #ccc;padding:10px;">
                            {{ __('messages.role') }}
                        </th>

                        <th style="border:1px solid #ccc;padding:10px;">
                            {{ __('messages.blocked') }}
                        </th>

                        <th style="border:1px solid #ccc;padding:10px;">
                            {{ __('messages.actions') }}
                        </th>

                    </tr>

                </thead>

                <tbody>

                @foreach($users as $user)

                    <tr>

                        <td style="border:1px solid #ccc;padding:10px;">
                            {{ $user->id }}
                        </td>

                        <td style="border:1px solid #ccc;padding:10px;">
                            {{ $user->name }}
                        </td>

                        <td style="border:1px solid #ccc;padding:10px;">
                            {{ $user->surname }}
                        </td>

                        <td style="border:1px solid #ccc;padding:10px;">
                            {{ $user->email }}
                        </td>

                        <td style="border:1px solid #ccc;padding:10px;">
                            {{ $user->role }}
                        </td>

                        <td style="border:1px solid #ccc;padding:10px;">
                            {{ $user->is_blocked ? __('messages.yes') : __('messages.no') }}
                        </td>

                        <td style="border:1px solid #ccc;padding:10px;">

                            @if($user->id !== Auth::id())

                                @if(!$user->is_blocked)

                                    <form method="POST"
                                          action="{{ route('admin.users.block', $user) }}"
                                          style="display:inline;">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                                style="
                                                    background-color:#dc3545;
                                                    color:white;
                                                    border:none;
                                                    padding:6px 12px;
                                                    cursor:pointer;
                                                    width:140px;
                                                ">
                                            {{ __('messages.block') }}
                                        </button>

                                    </form>

                                @else

                                    <form method="POST"
                                          action="{{ route('admin.users.unblock', $user) }}"
                                          style="display:inline;">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                                style="
                                                    background-color:#198754;
                                                    color:white;
                                                    border:none;
                                                    padding:6px 12px;
                                                    cursor:pointer;
                                                    width:140px;
                                                ">
                                            {{ __('messages.unblock') }}
                                        </button>

                                        

                                    </form>

                                @endif

                            @endif

                            <br><br>

                            @if($user->role === 'user')

                                <form method="POST"
                                      action="{{ route('admin.users.make-admin', $user) }}">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            style="
                                                background-color:#0d6efd;
                                                color:white;
                                                border:none;
                                                padding:6px 12px;
                                                cursor:pointer;
                                                width:140px;
                                            ">
                                        {{ __('messages.make_admin') }}
                                    </button>

                                </form>

                            @elseif($user->role === 'admin' && $user->id !== auth()->id())

                                <form method="POST"
                                      action="{{ route('admin.users.make-user', $user) }}">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            style="
                                                background-color:#6c757d;
                                                color:white;
                                                border:none;
                                                padding:6px 12px;
                                                cursor:pointer;
                                                width:140px;
                                            ">
                                        {{ __('messages.make_user') }}
                                    </button>

                                </form>

                            @endif

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>
    </div>

</x-app-layout>