<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FinancialRecord;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

    $users = User::all();

    return view('admin.index',compact('users'));
}

public function block(User $user){

    if ($user->id === Auth::id()) {
    return back();
}

    $user->update(['is_blocked' => true]);

    return redirect()->route('admin.index')->with('success', __('messages.user_blocked'));
}

public function unblock(User $user)
{
    $user->update(['is_blocked' => false]);

    return redirect()->route('admin.index')->with('success', __('messages.user_blocked'));
}

public function makeAdmin(User $user)
{
    $user->update(['role' => 'admin']);

    return redirect()->route('admin.index')->with('success', __('messages.user_promoted'));
}

public function makeUser(User $user)
{
    if ($user->id === Auth::id()) {
        return back();
    }

    $user->update(['role' => 'user']);

    return redirect()->route('admin.index')->with('success', __('messages.user_demoted'));
}

public function financialRecords()
{
    $records = FinancialRecord::with(['user','category'])->get();

    return view('admin.financial-records', compact('records'));
}

}
