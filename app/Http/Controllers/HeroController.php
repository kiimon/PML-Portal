<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::all();

        return view('heroes.index', compact('heroes'));
    }

    public function store(Request $request)
    {
        Hero::create([
            'name'=>$request->name,
            'icon_url'=>$request->icon_url,
            'portrait_url'=>$request->portrait_url
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Hero $hero)
    {
        $hero->update([
            'name'=>$request->name,
            'icon_url'=>$request->icon_url,
            'portrait_url'=>$request->portrait_url
        ]);

        return redirect()->back();
    }
}