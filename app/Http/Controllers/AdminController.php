<?php

namespace App\Http\Controllers;

use App\Models\Continues;
use App\Models\Customer;
use App\Models\Delegate;
use App\Models\Direct;
use App\Models\Note;
use App\Models\Notification;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Publication;
use App\Models\PublicReply;
use App\Models\Rank;
use App\Models\Reply;
use App\Models\Standing;
use App\Models\Type;
use App\Models\User;
use App\Models\Viewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $customersCnt = Customer::all()->count();
        $directsCnt = Direct::all()->count();
        $usersCnt = User::where('role_as', '!=', 'SUPER_ADMIN')->count();
        $messagesCnt = Post::all()->count();
        $ranksCnt = Rank::all()->count();
        $continuesCnt = Continues::all()->count();
        $publicationsCnt = Publication::all()->count();
        $standingsCnt = Standing::all()->count();
        $typesCnt = Type::all()->count();
        $notificationsCnt = Notification::all()->count();
        $notesCnt = Note::all()->count();
        $delegatesCnt = Delegate::all()->count();
        return view('admin.index', [
            'name' => auth()->user()->name,
            'customersCnt' => $customersCnt,
            'directsCnt' => $directsCnt,
            'usersCnt' => $usersCnt,
            'messagesCnt' => $messagesCnt,
            'ranksCnt' => $ranksCnt,
            'continuesCnt' => $continuesCnt,
            'publicationsCnt' => $publicationsCnt,
            'standingsCnt' => $standingsCnt,
            'typesCnt' => $typesCnt,
            'notificationsCnt' => $notificationsCnt,
            'notesCnt' => $notesCnt,
            'delegatesCnt' => $delegatesCnt,
        ]);
    }

    public function admins()
    {
        $users = User::where('role_as', '!=', 'SUPER_ADMIN')->get();
        return view('admin.admins', [
            'name' => auth()->user()->name,
            'users' => $users,
        ]);
    }
    public function customers()
    {
        $customers = Customer::all();
        return view('admin.customers', [
            'name' => auth()->user()->name,
            'customers' => $customers,
        ]);
    }

    public function directs()
    {
        $directs = Direct::groupBy('name')->select("name", \DB::raw('count(*) as Total'))->get();
        return view('admin.directs', [
            'name' => auth()->user()->name,
            'directs' => $directs,
        ]);
    }

    public function messages()
    {
        $messages = Post::all();
        return view('admin.messages', [
            'name' => auth()->user()->name,
            'messages' => $messages,
        ]);
    }

    public function ranks()
    {
        $ranks = Rank::all();
        return view('admin.ranks', [
            'name' => auth()->user()->name,
            'ranks' => $ranks,
        ]);
    }
    public function continues()
    {
        $continues = Continues::all();
        return view('admin.continues', [
            'name' => auth()->user()->name,
            'continues' => $continues,
        ]);
    }

    public function publications()
    {
        $publications = Publication::all();
        return view('admin.publications', [
            'name' => auth()->user()->name,
            'publications' => $publications
        ]);
    }

    public function addAdmin()
    {
        return view('admin.add-admin', [
            'name' => auth()->user()->name,
        ]);
    }

    public function addPost(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:20|unique:users,name',
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|string|confirmed',
            'phone' => 'required|numeric|min:5',
        ]);
        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
        ]);
        return redirect(url('/admin/admins'));
    }

    public function editAdmin($id)
    {
        $types = Type::all();
        $users = User::where('role_as', '!=', 'SUPER_ADMIN')->get();
        $admin = User::findOrFail($id);
        $delegates = Delegate::all();
        $ranks = Rank::all();
        $continues = Continues::all();
        $standings = Standing::all();
        $notes = Note::all();
        return view('admin.edit-admin', [
            'name' => auth()->user()->name,
            'admin' => $admin,
            'types' => $types,
            'users' => $users,
            'delegates' => $delegates,
            'ranks' => $ranks,
            'continues' => $continues,
            'standings' => $standings,
            'notes' => $notes,
        ]);
    }
    public function editAdminPost(Request $request, $adminId)
    {
        $request->validate([
            'username' => 'required|string|max:20',
            'email' => 'required|email|max:50',
        ]);

        $admin = User::findOrFail($adminId);

        if (!$request->has('allPower') and !$request->has('allPower') and !$request->has('allPower') and !$request->has('allPower') and !$request->has('allPower') and !$request->has('allPower') and !$request->has('allPower') and !$request->has('allPower')) {
            $admin->update([
                'allPower' => 'allPower',
            ]);
        }

        if ($request->has('allPower')) {
            $admin->update([
                'typePower' => null,
                'userPower' => null,
                'delegatePower' => null,
                'rankPower' => null,
                'continuePower' => null,
                'standingPower' => null,
                'notePower' => null,
                'allPower' => 'allPower',
            ]);
        } else {
            if ($request->has('typePower')) {
                $admin->update([
                    'typePower' => $request->typePower,
                    'allPower' => null,
                ]);
            } else {
                $admin->update([
                    'typePower' => null,
                ]);
            }
            if ($request->has('userPower')) {
                $admin->update([
                    'userPower' => $request->userPower,
                    'allPower' => null,
                ]);
            } else {
                $admin->update([
                    'userPower' => null,
                ]);
            }
            if ($request->has('delegatePower')) {
                $admin->update([
                    'delegatePower' => $request->delegatePower,
                    'allPower' => null,
                ]);
            } else {
                $admin->update([
                    'delegatePower' => null,
                ]);
            }
            if ($request->has('rankPower')) {
                $admin->update([
                    'rankPower' => $request->rankPower,
                    'allPower' => null,
                ]);
            } else {
                $admin->update([
                    'rankPower' => null,
                ]);
            }
            if ($request->has('continuePower')) {
                $admin->update([
                    'continuePower' => $request->continuePower,
                    'allPower' => null,
                ]);
            } else {
                $admin->update([
                    'continuePower' => null,
                ]);
            }
            if ($request->has('standingPower')) {
                $admin->update([
                    'standingPower' => $request->standingPower,
                    'allPower' => null,
                ]);
            } else {
                $admin->update([
                    'standingPower' => null,
                ]);
            }
            if ($request->has('notePower')) {
                $admin->update([
                    'notePower' => $request->notePower,
                    'allPower' => null,
                ]);
            } else {
                $admin->update([
                    'notePower' => null,
                ]);
            }
        }




        $admin->update([
            'name' => $request->username,
            'email' => $request->email,
            'can' => $request->canJoin,
        ]);
        return redirect(url('/admin/admins'));
    }

    public function deleteAdmin($id)
    {
        $admin = User::findOrFail($id);
        if ($admin->role_as == 'SUPER_ADMIN') {
            return back();
        } else {
            $admin->delete();
        }
        return redirect(url('/admin/admins'));
    }

    public function deleteCustomer($id)
    {
        $phones = Phone::where('customer_id', '=', $id)->get();
        foreach ($phones as $phone) {
            $phone->delete();
        }
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect(url('/admin/customers'));
    }

    public function deleteDirect($name)
    {

        $direct = Direct::where('name', '=', $name)->first();

        if (!$direct) {
            return redirect(url('/admin/directs'));
        } else {
            $customers = Customer::where('direct_id', '=', $direct->id)->get();
            foreach ($customers as $customer) {
                $phones = Phone::where('customer_id', '=', $customer->id)->get();
                foreach ($phones as $phone) {
                    $phone->delete();
                }
                $customer->delete();
            }
            $direct->delete();
            return redirect(url('/admin/directs'));
        }
    }

    public function deleteMessage($id)
    {
        $message = Post::findOrFail($id);
        $replies = Reply::where('post_id', '=', $id)->get();
        foreach ($replies as $reply) {
            $reply->delete();
        }
        $message->delete();
        return redirect(url('/admin/messages'));
    }

    public function addRank()
    {
        return view('admin.add-rank', [
            'name' => auth()->user()->name,
        ]);
    }

    public function addRankPost(Request $request)
    {
        $request->validate([
            'rank' => 'required|string|unique:ranks,rank',
        ]);
        Rank::create([
            'rank' => $request->rank,
        ]);
        return redirect(url('/admin/ranks'));
    }

    public function deleteRank($id)
    {
        $rank = Rank::findOrFail($id);
        $rank->delete();
        return redirect(url('/admin/ranks'));
    }

    public function addContinue()
    {
        return view('admin.add-continue', [
            'name' => auth()->user()->name,
        ]);
    }

    public function addContinuePost(Request $request)
    {
        $request->validate([
            'continue' => 'required|string|unique:continues,continue',
        ]);
        Continues::create([
            'continue' => $request->continue,
        ]);
        return redirect(url('/admin/continues'));
    }

    public function deleteContinue($id)
    {
        $continue = Continues::findOrFail($id);
        $continue->delete();
        return redirect(url('/admin/continues'));
    }

    public function deletePublication($id)
    {
        $publicReplies = PublicReply::where('publication_id', '=', $id)->get();
        $viewers = Viewer::where('publication_id', '=', $id)->get();

        $publication = Publication::findOrFail($id);


        foreach ($viewers as $viewer) {
            $viewer->delete();
        }

        foreach ($publicReplies as $reply) {
            $reply->delete();
        }
        $publication->delete();
        return redirect(url('/admin/publications'));
    }

    public function standings()
    {
        $standings = Standing::all();
        return view('admin.standings', [
            'name' => auth()->user()->name,
            'standings' => $standings,
        ]);
    }

    public function addStanding()
    {
        return view('admin.add-standing', [
            'name' => auth()->user()->name,
        ]);
    }

    public function addStandingPost(Request $request)
    {
        $request->validate([
            'standing' => 'required|string|unique:standings,standings',
        ]);
        Standing::create([
            'standings' => $request->standing,
        ]);
        return redirect(url('/admin/standings'));
    }

    public function deleteStanding($sId)
    {
        Standing::findOrFail($sId)->delete();
        return redirect(url('/admin/standings'));
    }

    public function types()
    {
        $name = auth()->user()->name;
        $types = Type::all();
        return view('admin.types', [
            'types' => $types,
            'name' => $name,

        ]);
    }

    public function type()
    {
        $name = auth()->user()->name;
        return view('admin.add-type', [
            'name' => $name
        ]);
    }

    public function typePost(Request $request)
    {
        $request->validate([
            'type' => 'string|unique:types,type',
        ]);
        Type::create([
            'type' => $request->type,
        ]);
        return redirect(url('/admin/types'));
    }

    public function removeType($id)
    {
        Type::findOrFail($id)->delete();
        return redirect(url('/admin/types'));
    }

    public function notifications()
    {
        $notifications = Notification::orderBy('id', 'DESC')->get();
        $name = Auth::user()->name;
        return view('admin.notifications', [
            'notifications' => $notifications,
            'name' => $name,
        ]);
    }

    public function deleteNotification($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return redirect(url('/admin/notify'));
    }

    public function deleteAllNotifications()
    {
        $notifications = Notification::all();
        foreach ($notifications as $notification) {
            $notification->delete();
        }
        return redirect(url('/admin/notify'));
    }

    public function notes()
    {
        $notes = Note::all();
        $name = auth()->user()->name;
        return view('admin.notes', [
            'notes' => $notes,
            'name' => $name,
        ]);
    }

    public function addNote()
    {
        $name = auth()->user()->name;
        return view('admin.add-note', [
            'name' => $name,
        ]);
    }

    public function addNotePost(Request $request)
    {
        $request->validate([
            'note' => 'required|string'
        ]);

        Note::create([
            'note' => $request->note,
        ]);
        return redirect(url('/admin/notes'));
    }

    public function deleteNote($id)
    {
        Note::findOrFail($id)->delete();
        return redirect(url('/admin/notes'));
    }

    public function profile()
    {
        $name = auth()->user()->name;

        return view('admin.profile', [
            'name' => $name,
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'password' => 'string|min:2|confirmed',
        ]);
        $user = User::findOrFail(auth()->user()->id);

        $user->update([
            'password' => bcrypt($request->password),
        ]);
        return redirect(url('/admin'));
    }

    public function delegates()
    {
        $delegates = Delegate::all();
        $name = auth()->user()->name;
        return view('admin.delegates', [
            'delegates' => $delegates,
            'name' => $name,
        ]);
    }

    public function addDelegate()
    {
        $name = auth()->user()->name;
        return view('admin.add-delegate', [
            'name' => $name,
        ]);
    }

    public function addDelegatePost(Request $request)
    {
        $request->validate([
            'Delegate' => 'required|string',
        ]);
        Delegate::create([
            'name' => $request->Delegate,
        ]);
        return redirect(url('/admin/delegates'));
    }

    public function deleteDelegate($id)
    {
        $delegate = Delegate::findOrFail($id);
        $delegate->delete();
        return redirect(url('/admin/delegates'));
    }
}
