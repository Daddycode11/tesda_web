<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class MessageController extends Controller
{
    // User side: Show only messages related to the logged-in user
    public function index()
    {
        $messages = Message::with(['sender', 'receiver'])
            ->where(function ($query) {
                $query->where('to_user_id', Auth::id())
                      ->orWhere('from_user_id', Auth::id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('messages.index', compact('messages'));
    }

    // User/Admin: Store message
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'to_user_id' => 'required|exists:users,id',
        ]);

        $message = Message::create([
            'from_user_id' => Auth::id(),
            'to_user_id'   => $request->to_user_id,
            'message'      => $request->message,
            'is_read'      => false,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return back()->with('success', 'Message sent successfully!');
    }

    // 🔹 Admin: See list of users who messaged
    public function adminIndex()
    {
        // Get all users that have messages with admin
        $userIds = Message::select('from_user_id', 'to_user_id')
            ->where('to_user_id', Auth::id())   // messages sent to admin
            ->orWhere('from_user_id', Auth::id()) // messages sent by admin
            ->get()
            ->flatMap(function ($msg) {
                return [$msg->from_user_id, $msg->to_user_id];
            })
            ->unique()
            ->reject(fn ($id) => $id == Auth::id());

        $users = User::whereIn('id', $userIds)->get();

        return view('admin.messages.index', compact('users'));
    }

    // 🔹 Admin: Open conversation with a specific user
    // In MessageController.php

// Admin: open conversation with user
public function adminReply($userId)
{
    $messages = Message::with(['sender', 'receiver'])
        ->where(function ($query) use ($userId) {
            $query->where('from_user_id', Auth::id())
                  ->where('to_user_id', $userId);
        })
        ->orWhere(function ($query) use ($userId) {
            $query->where('from_user_id', $userId)
                  ->where('to_user_id', Auth::id());
        })
        ->orderBy('created_at', 'asc')
        ->get();

    $user = \App\Models\User::findOrFail($userId);

    return view('admin.messages.reply', compact('messages', 'user'));
}

// Admin: send message to user
public function adminSend(Request $request, $userId)
{
    $request->validate([
        'message' => 'required|string|max:1000',
    ]);

    $message = Message::create([
        'from_user_id' => Auth::id(),  // admin ID
        'to_user_id'   => $userId,
        'message'      => $request->message,
        'is_read'      => false,
    ]);

    broadcast(new \App\Events\MessageSent($message))->toOthers();

    return back()->with('success', 'Message sent to user!');
}
}
