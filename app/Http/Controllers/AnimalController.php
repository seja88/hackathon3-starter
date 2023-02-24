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

    public function create($ownerId)
    {
        $animal = new Animal();

        $animal->owner_id = $ownerId;

        return view('form.form_animal', compact('animal'));
    }


    public function insert(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'species' => 'required|max:20',
            'breed' => 'required',
            'age' => 'required|max:13',
            'weight' => 'required|max:25',
        ]);

        $animal = new Animal();

        $animal->owner_id = $request->post('owner_id');
        $animal->name = $request->post('name');
        $animal->species = $request->post('species');
        $animal->breed = $request->post('breed');
        $animal->age = $request->post('age');
        $animal->weight = $request->post('weight');
        $animal->save();

        session()->flash('success_message', 'Animal successfully created');
        // dd($animal);
        return redirect()->route('animals.edit', $animal->id);
    }

    public function edit($animalId)
    {
        $animal = Animal::findOrFail($animalId);

        return view('form.form_animal', compact('animal'));
    }

    public function update(Request $request, $animalId)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'species' => 'required|max:20',
            'breed' => 'required',
            'age' => 'required|max:13',
            'weight' => 'required|max:25',
        ]);

        $animal = Animal::findOrFail($animalId);

        $animal->owner_id = $request->post('owner_id');
        $animal->name = $request->post('name');
        $animal->species = $request->post('species');
        $animal->breed = $request->post('breed');
        $animal->age = $request->post('age');
        $animal->weight = $request->post('weight');
        $animal->save();

        session()->flash('success_message', 'Animal successfully updated');


        return redirect()->route('animals.edit', $animalId);
    }
    public function delete($animalId)
    {
        $animal = Animal::findOrFail($animalId);

        $animal->delete();

        session()->flash('success_message', $animal->name . ' succesfully deleted');

        return redirect()->route('owners.index');
    }
}
