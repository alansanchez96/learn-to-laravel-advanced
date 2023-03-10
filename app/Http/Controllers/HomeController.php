<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\Facades\CacheComposite;

class HomeController extends Controller
{
    public function index()
    {
        $users = CacheComposite::getCacheOrCreate('users', User::class, ['id', 'name']);

        return view('welcome', compact('users'));
    }

    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return redirect()->back()->with('create', 'Notificaciones leidas');
    }

    public function readNotification(Request $request, $id)
    {
        auth()->user()->unreadNotifications
            ->when($request->id, fn ($query, $id) => $query->where('id', $id))->markAsRead();

        return redirect()->back()->with('create', 'Notificacion leída');
    }
}
