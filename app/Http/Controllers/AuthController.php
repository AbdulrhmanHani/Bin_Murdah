<?php

namespace App\Http\Controllers;

use App\Models\Continues;
use App\Models\Customer;
use App\Models\Delegate;
use App\Models\Direct;
use App\Models\Note;
use App\Models\Notification;
use App\Models\Rank;
use App\Models\Standing;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{























    public function index(Request $request)
    {
        $directs = Direct::all();
        if (auth()->user()->allPower == 'allPower') {
            $customers = Customer::all();
        } else {
            $customers = Customer::where('type', '=', auth()->user()->typePower)
            ->orWhere('admin_name', '=', auth()->user()->userPower)
            ->orWhere('delegate_name', '=', auth()->user()->delegatePower)
            ->orWhere('rank', '=', auth()->user()->rankPower)
            ->orWhere('continue', '=', auth()->user()->continuePower)
            ->orWhere('direct_standing', '=', auth()->user()->standingPower)
            ->orWhere('note', '=', auth()->user()->notePower)
            ->get();
        }

        $customers;

        $ranks = Rank::all();
        $standings = Standing::all();
        $continues = Continues::all();
        $types = Type::all();
        $notes = Note::all();
        $delegates = Delegate::all();
        $users = User::where('role_as', '!=', 'SUPER_ADMIN')->get();


        if (auth()->user()->allPower !== null) {
            return view('index', [
                'users' => $users,
                'directs' => $directs,
                'standings' => $standings,
                'ranks' => $ranks,
                'continues' => $continues,
                'types' => $types,
                'notes' => $notes,
                'delegates' => $delegates,
                'customers' => $customers,
            ]);
        } else {
            if (auth()->user()->typePower !== null) {
                $types = Customer::where('type', '=', auth()->user()->typePower)->get();
            }
            if (auth()->user()->userPower !== null) {
                $users = User::where('name', '=', auth()->user()->userPower)->get();
            }
            if (auth()->user()->delegatePower !== null) {
                $delegates = Delegate::where('name', '=', auth()->user()->delegatePower)->get();
            }
            if (auth()->user()->rankPower !== null) {
                $ranks = Rank::where('rank', '=', auth()->user()->rankPower)->get();
            }
            if (auth()->user()->continuePower !== null) {
                $continues = Continues::where('continue', '=', auth()->user()->continuePower)->get();
            }
            if (auth()->user()->standingPower !== null) {
                $standings = Standing::where('standings', '=', auth()->user()->standingPower)->get();
            }
            if (auth()->user()->notePower !== null) {
                $notes = Note::where('note', '=', auth()->user()->notePower)->get();
            }


            return view('index', [
                'users' => $users,
                'directs' => $directs,
                'standings' => $standings,
                'ranks' => $ranks,
                'continues' => $continues,
                'types' => $types,
                'notes' => $notes,
                'delegates' => $delegates,
                'customers' => $customers,

            ]);
        }
    }












































    public function signinForm()
    {
        return view("signin");
    }

    public function signin(Request $request)
    {
        $request->validate([
            'emailOrPhoneOrName' => 'required|max:50',
            'password' => 'required|string',
        ]);

        $userEmail = User::where('email', '=', $request->emailOrPhoneOrName)->first();
        $userPhone = User::where('phone', '=', $request->emailOrPhoneOrName)->first();
        $userName = User::where('name', '=', $request->emailOrPhoneOrName)->first();

        if ($userEmail) {
            $is_correct = Auth::attempt(['email' => $userEmail, 'password' => $request->password]);
            if (!$is_correct) {
                return back();
            } else {
                $userEmail->update([
                    'is_online' => '1',
                ]);
                return redirect('/');
            }
        } elseif ($userPhone) {
            $is_correct = Auth::attempt(['phone' => $userPhone, 'password' => $request->password]);
            if (!$is_correct) {
                return back();
            } else {
                $userPhone->update([
                    'is_online' => '1',
                ]);
                return redirect('/');
            }
        } elseif ($userName) {
            $is_correct = Auth::attempt(['name' => $userName, 'password' => $request->password]);
            if (!$is_correct) {
                return back();
            } else {
                $userName->update([
                    'is_online' => '1',
                ]);
                return redirect('/');
            }
        } else {
            return back();
        }
    }

    public function addCustomer()
    {
        return view('addCustomer');
    }
    public function logout()
    {
        $U = Auth::user();
        $user = User::findOrFail($U->id);
        $user->update([
            'is_online' => '0',
        ]);
        Notification::create([
            'content' => "المستخدم $user->name قام بتسجيل الخروج",
        ]);
        Auth::logout();
        return redirect(url('/signin'));
    }

    public function profile()
    {
        return view('profile');
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
        return redirect(url('/'));
    }
}
