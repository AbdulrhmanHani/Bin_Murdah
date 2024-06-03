<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReplyController extends Controller
{
    public function reply(Request $request, $postId)
    {
        $request->validate([
            'reply_content' => 'required|string|max:255',
            'reply_img' => 'nullable|image|mimes:png,jpg,jpeg,gif',
        ]);

        if ($request->hasFile('reply_img')) {
            $img = $request->reply_img;
            $imgPath = Storage::putFile('/replies', $img);
        } else {
            $imgPath = null;
        }

        $user = auth()->user();
        Reply::create([
            'post_id' => $postId,
            'user_id' => $user->id,
            'replier_name' => $user->name,
            'reply_content' => $request->reply_content,
            'reply_img' => $imgPath,
        ]);
        $user = Auth::user()->name;
        $post = Post::findOrFail($postId);
        $postName = $post->title;

        Notification::create([
            'content' => "المندوب $user قام بالرد علي رسالة $postName",
        ]);

        return redirect(url('/post', $postId));

    }
}
