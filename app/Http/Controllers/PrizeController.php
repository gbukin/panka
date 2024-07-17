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
        $prizes = Prize::all();
        $prizes->map(function (Prize $prize) {
            $prize->image = Storage::url('prizes/' . $prize->image_name) . "?v=" . now()->format('u');

            unset($prize->image_name);
        });

        return Inertia::render('Prize/Index', ['prizes' => $prizes]);
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

        $image_name = 'prize_' . $prize->id . '.' . $image->getClientOriginalExtension();

        $prize->image_name = $image_name;
        $prize->save();

        $image->move(storage_path('app/public/prizes'), $image_name);

        return \redirect()->route('prizes.index');
    }

    public function edit(Prize $prize)
    {
        $prize->image_name = Storage::url('prizes/' . $prize->image_name);

        return Inertia::render('Prize/Edit', ['prize' => $prize]);
    }

    public function update(Request $request, Prize $prize)
    {
        $request->validate([
            'name' => 'string|required|max:255',
            'image' => 'file|mimes:jpeg,png,jpg|required',
        ]);

        Storage::disk('public')->delete('prizes/' . $prize->image_name);

        $image = $request->file('image');
        $image_name = 'prize_' . $prize->id . '.' . $image->getClientOriginalExtension();
        $image->move(storage_path('app/public/prizes'), $image_name);

        $prize->name = $request->name;
        $prize->image_name = $image_name;
        $prize->save();

        return \redirect()->route('prizes.index');
    }
}
