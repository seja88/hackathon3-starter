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
        $surname = $request->input('search');
        // dd($surname);
        $owners = Owner::query()
            ->where('surname', 'like', '%' . $surname . '%')
            ->get();
        // dd($owners);
        return view('search.search', compact('owners'));
    }
}
