<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {


        return view('welcome.index');
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required|max:20'
        ]);

        $surname = $request->input('search');
        // dd($surname);
        $owners = Owner::query()
            ->where('surname', 'like', '%' . $surname . '%')
            ->get();
        // dd($owners);
        return view('search.search', compact('owners'));
    }

    public function create()
    {
        $owner = new Owner();

        return view('form.form', compact('owner'));
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:20',
            'surname' => 'required|max:20',
            'email' => 'required|email',
            'phone' => 'required|max:13',
            'address' => 'required|max:25',
        ]);

        $owner = new Owner();

        $owner->first_name = $request->post('first_name');
        $owner->surname = $request->post('surname');
        $owner->email = $request->post('email');
        $owner->phone = $request->post('phone');
        $owner->address = $request->post('address');
        $owner->save();

        session()->flash('success_message', 'Customer successfully created');


        return redirect()->route('owners.edit', $owner->id);
    }

    public function edit($ownerId)
    {
        $owner = Owner::findOrFail($ownerId);


        return view('form.form', compact('owner'));
    }

    public function update(Request $request, $ownerId)
    {
        $this->validate($request, [
            'first_name' => 'required|max:20',
            'surname' => 'required|max:20',
            'email' => 'required|email',
            'phone' => 'required|max:13',
            'address' => 'required|max:25',
        ]);

        $owner = Owner::findOrFail($ownerId);
        $owner->first_name = $request->post('first_name');
        $owner->surname = $request->post('surname');
        $owner->email = $request->post('email');
        $owner->phone = $request->post('phone');
        $owner->address = $request->post('address');
        $owner->save();

        session()->flash('success_message', 'Customer successfully updated');

        return redirect()->route('owners.edit', $ownerId);
    }

    public function delete($ownerId)
    {
        $owner = Owner::findOrFail($ownerId);

        $owner->delete();

        session()->flash('success_message', $owner->name . ' succesfully deleted');

        return redirect()->route('owners.index');
    }
}
