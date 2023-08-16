<?php

namespace App\Http\Controllers;

use App\Models\FitnessClass;
use Illuminate\Http\Request;

class FitnessClassController extends Controller
{
    public function index()
    {
        $classes = FitnessClass::all();
        return view('fitness.index', compact('classes'));
    }

    public function create()
    {
        return view('fitness.create');
    }

    public function edit($id)
    {
        $class = FitnessClass::findOrFail($id);
        return view('fitness.edit', compact('class'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:40',
            'description'=>'required|max:40',
        ]);
        $clss = new FitnessClass();
        $clss->name = $request->name;
        $clss->description = $request->description;
        $clss->save();
        
        return redirect()->route('fitness.index')->with('msg','Class  added successfully');
   }
}
