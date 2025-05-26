<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function save(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        Chat::updateOrCreate(
            ['user_id' => $user->id],
            ['messages' => $request->messages]
        );
        return response()->json(['success' => true]);
    }

    public function history()
    {
        $user = Auth::guard('sanctum')->user();
        $chat = Chat::where('user_id', $user->id)->first();
        return response()->json($chat ? $chat->messages : []);
    }

    public function uploadFile(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('chat_files', 'public');
            $url = asset('storage/' . $path);
            return response()->json(['url' => $url]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
