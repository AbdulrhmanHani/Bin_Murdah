<?php

namespace App\Http\Controllers;

use App\Models\Continues;
use App\Models\Customer;
use App\Models\Delegate;
use App\Models\Direct;
use App\Models\Note;
use App\Models\Notification;
use App\Models\Phone;
use App\Models\Rank;
use App\Models\Standing;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function addCustomer()
    {
        $customers = Customer::all();
        $users = User::where('role_as', '!=', 'SUPER_ADMIN')->get();
        $directs = Direct::all();
        $types = Type::all();
        $continues = Continues::all();
        $ranks = Rank::all();
        $standings = Standing::all();
        $notes = Note::all();
        $delegates = Delegate::all();
        return view('addCustomer', [
            'customers' => $customers,
            'directs' => $directs,
            'types' => $types,
            'users' => $users,
            'continues' => $continues,
            'ranks' => $ranks,
            'standings' => $standings,
            'notes' => $notes,
            'delegates' => $delegates,
        ]);
    }


    public function addCustomerPost(Request $request)
    {
        $request->validate([
            'directName' => 'required',
            'directStanding' => 'required',
            'customerName' => 'required',
            'delegate' => 'required',
            'customerType' => 'required',
            'customerRank' => 'required',
            'phone1' => 'required',
            'notes' => 'required',
            'customerContinue' => 'required',
            'NOTE' => 'required|exists:notes,note',
            'Delegate' => 'required|exists:delegates,name',
        ]);
        $direct = Direct::create([
            'name' => $request->directName,
            'standing' => $request->directStanding,
        ]);
        $delegate = User::where('name', '=', $request->delegate)->get();
        $customer = Customer::create([
            'admin_name' => $request->delegate,
            'direct_name' => $direct->name,
            'direct_standing' => $direct->standing,
            'name' => $request->customerName,
            'user_id' => $delegate[0]->id,
            'type' => $request->customerType,
            'rank' => $request->customerRank,
            'direct_id' => $direct->id,
            'phone_number1' => $request->phone1,
            'notes' => $request->notes,
            'continue' => $request->customerContinue,
            'note' => $request->NOTE,
            'delegate_name' => $request->Delegate,
        ]);
        $phone2 = $request->phone2;
        $phone3 = $request->phone3;
        Phone::create([
            'customer_id' => $customer->id,
            'phone_number1' => $request->phone1,
            'phone_number2' => $phone2,
            'phone_number3' => $phone3
        ]);
        $user = Auth::user()->name;
        Notification::create([
            'content' => "المندوب $user قام بإضافة عميل جديد $request->customerName",
        ]);

        return redirect(url('/'));
    }

    public function search(Request $request)
    {
        $key = $request->key;



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
            $customers = Customer::where('type', '=', auth()->user()->typePower)
                ->orWhere('admin_name', '=', auth()->user()->userPower)
                ->orWhere('delegate_name', '=', auth()->user()->delegatePower)
                ->orWhere('rank', '=', auth()->user()->rankPower)
                ->orWhere('continue', '=', auth()->user()->continuePower)
                ->orWhere('direct_standing', '=', auth()->user()->standingPower)
                ->orWhere('note', '=', auth()->user()->notePower)
                ->get();

                dd($customers);





            return view('index', [
                // 'users' => $users,
                // 'directs' => $directs,
                // 'standings' => $standings,
                // 'ranks' => $ranks,
                // 'continues' => $continues,
                // 'types' => $types,
                // 'notes' => $notes,
                // 'delegates' => $delegates,
                'customers' => $customers,

            ]);
        }



















































        return view('index');
    }

    public function filter(Request $request)
    {
        $users = User::where('role_as', '!=', 'SUPER_ADMIN')->get();
        $customers = Customer::where('type', '=', $request->type)
            ->orWhere('admin_name', '=', $request->user)
            ->orWhere('rank', '=', $request->rank)
            ->orWhere('continue', '=', $request->continue)
            ->orWhere('direct_standing', '=', $request->standing)
            ->orWhere('note', '=', $request->note)
            ->get();
        $ranks = Rank::all();
        $standings = Standing::all();
        $continues = Continues::all();
        $types = Type::all();
        $notes = Note::all();
        return view('index', [
            'customers' => $customers,
            'users' => $users,
            'standings' => $standings,
            'ranks' => $ranks,
            'continues' => $continues,
            'types' => $types,
            'notes' => $notes,

        ]);
    }

    public function edit($id)
    {
        $users = User::where('role_as', '!=', 'SUPER_ADMIN')->get();
        $directs = Direct::all();
        $types = Type::all();
        $continues = Continues::all();
        $ranks = Rank::all();
        $standings = Standing::all();


        $customer = Customer::findOrFail($id);
        return view('edit-customer', [
            'customer' => $customer,
            'directs' => $directs,
            'types' => $types,
            'users' => $users,
            'continues' => $continues,
            'ranks' => $ranks,
            'standings' => $standings,
        ]);
    }

    public function editPost(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $phone = Phone::where('customer_id', '=', $id)->first();
        $phone->update([
            'phone_number1' => $request->phone_number1,
            'phone_number2' => $request->phone_number2,
            'phone_number3' => $request->phone_number3,
        ]);
        $customer->update([
            'name' => $request->username,
            'user_id' => $request->user,
            'direct_id' => $request->direct,
            'type' => $request->type,
            'rank' => $request->rank,
            'phone_number1' => $request->phone_number1,
            'notes' => $request->notes,
            'continue' => $request->continue,
            'direct_name' => $request->direct,
            'direct_standing' => $request->standing
        ]);
        $user = Auth::user()->name;
        Notification::create([
            'content' => "المندوب $user قام بالتعديل علي بيانات العميل $request->username"
        ]);

        return redirect(url('/'));
    }
}
