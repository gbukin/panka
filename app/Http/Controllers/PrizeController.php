<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PrizeController extends Controller
{
    public function index()
    {
        return Inertia::render('Prize/Index', ['prizes' => Prize::all()]);
    }

    public function create()
    {
        return Inertia::render('Prize/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required|max:255',
            'image' => 'file|mimes:jpeg,png,jpg|required',
        ]);

        $image = $request->file('image');

        $prize = new Prize();
        $prize->name = $request->name;
        $prize->save();

        $image_name = 'prize_' . $prize->id . '.' .  $image->getClientOriginalExtension();

        $prize->image_name = $image_name;
        $prize->save();

        $image->move(storage_path('app/public/prizes'), $image_name);

        return \redirect()->route('prizes.index');
    }
}
