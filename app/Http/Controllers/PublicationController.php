<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Publication;
use App\Models\PublicReply;
use App\Models\User;
use App\Models\Viewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    public function create()
    {
        $users = User::where('role_as', '!=', 'SUPER_ADMIN')->where('id', '!=', auth()->user()->id)->get();
        return view('publications.create', [
            'users' => $users,
        ]);
    }

    public function createPublication(Request $request)
    {
        $users = User::where('role_as', '!=', 'SUPER_ADMIN')->where('id', '!=', auth()->user()->id)->get();

        $request->validate([
            'postTitle' => 'required',
            'postContent' => 'required',
            'publicImg' => 'nullable|image|mimes:png,jpg,jpeg,gif'
        ]);

        if ($request->hasFile('publicImg')) {
            $img = $request->publicImg;
            $imgPath = Storage::putFile('/publications', $img);
        } else {
            $imgPath = null;
        }

        if ($request->has('allToSee')) {
            $publication = Publication::create([
                'user_id' => auth()->user()->id,
                'publish_title' => $request->postTitle,
                'publish_content' => $request->postContent,
                'publish_img' => $imgPath,
            ]);
            foreach ($users as $user) {
                Viewer::create([
                    'user_id' => $user->id,
                    'publication_id' => $publication->id,
                ]);
            }
        } else {
            foreach ($users as $user) {
                if ($request->has($user->id)) {
                    $res[] = $user->id;
                }
            }
            $publication = Publication::create([
                'user_id' => auth()->user()->id,
                'publish_title' => $request->postTitle,
                'publish_content' => $request->postContent,
                'publish_img' => $imgPath,
            ]);
            foreach ($res as $r) {
                Viewer::create([
                    'user_id' => $r,
                    'publication_id' => $publication->id,
                ]);
            }
        }
        $user = Auth::user()->name;
        Notification::create([
            'content' => "المندوب $user قام بإنشاء منشور جديد",
        ]);
        return redirect(url('/public/create'));
    }

    public function all()
    {
        $superPublications = Publication::all();
        $publications = Publication::where('user_id', '=', auth()->user()->id)->get();
        $viewers = Viewer::where('user_id', '=', auth()->user()->id)->get();
        return view('publications.all', [
            'publications' => $publications,
            'viewers' => $viewers,
            'superPublications' => $superPublications,
        ]);
    }

    public function view($publicationId)
    {
        $publication = Publication::findOrFail($publicationId);
        return view('publications.view', [
            'publication' => $publication,
        ]);
    }

    public function post(Request $request, $publicationId)
    {
        $request->validate([
            'replyContent' => 'required|string',
            'public_reply_img' => 'nullable|image|mimes:png,jpg,jpeg,gif'
        ]);
        if ($request->hasFile('public_reply_img')) {
            $img = $request->public_reply_img;
            $imgPath = Storage::putFile('/pubReplies', $img);
        } else {
            $imgPath = null;
        }

        PublicReply::create([
            'user_id' => auth()->user()->id,
            'publication_id' => $publicationId,
            'public_reply_content' => $request->replyContent,
            'public_reply_img' => $imgPath,
        ]);


        $user = Auth::user()->name;
        $pub = Publication::findOrFail($publicationId);
        Notification::create([
            'content' => "المندوب $user $pub->publish_title قام بالرد علي منشور ",
        ]);

        return redirect(url("/public/view/$publicationId"));
    }
}
