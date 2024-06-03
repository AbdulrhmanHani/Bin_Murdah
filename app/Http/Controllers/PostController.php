<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function createPost()
    {
        $users = User::all();
        return view("createPost", [
            'users' => $users,
        ]);
    }

    public function createPostPost(Request $request)
    {
        $users = User::where('role_as', '!=', 'SUPER_ADMIN')->get();
        $request->validate([
            'reciverUser' => 'required',
            'postTitle' => 'required|string|max:75',
            'postContent' => 'required|string',
            'img' => 'nullable|image|mimes:png,jpg,jpeg,gif'
        ]);

        if ($request->hasFile('img')) {
            $img = $request->img;
            $imgPath = Storage::putFile('/messages', $img);
        } else {
            $imgPath = null;
        }

        Post::create([
            'creator_name' => auth()->user()->name,
            'title' => $request->postTitle,
            'content' => $request->postContent,
            'user_id' => $request->reciverUser,
            'img' => $imgPath,
        ]);
        $user = Auth::user()->name;
        $reciver = User::where('id', '=', $request->reciverUser)->first();
        Notification::create([
            'content' => "المندوب $user قام بإنشاء رسالة للمستخدم $reciver->name"
        ]);
        return redirect(url('/posts'));
    }

    public function posts()
    {
        $superPosts = Post::all();
        $posts = Post::where('creator_name', '=', auth()->user()->name)->orWhere('user_id', '=', auth()->user()->id)->get();

        return view('posts', [
            'posts' => $posts,
            'superPosts' => $superPosts,
        ]);
    }

    public function post($id)
    {
        $post = Post::findOrFail($id);
        return view('post', [
            'post' => $post,
        ]);
    }
}
