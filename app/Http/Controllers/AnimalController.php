<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function detail($animalId)
    {
        $animal = Animal::findOrFail($animalId);


        // dd($animal);
        return view('detail.detail', compact('animal'));
    }
}
