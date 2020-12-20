<?php

namespace App\Http\Controllers;

use App\Line;
use Illuminate\Http\Request;

class LineController extends Controller
{
    public function store(Request $request)
    {
        Line::create(['string' => $request->get('string')]);

        return redirect(route('home'))->with('status', 'Строка создана');
    }

    public function delete($lineId)
    {
        Line::where('id', $lineId)->delete();

        return redirect(route('home'))->with('status', 'Строка удалена');
    }

    public function makeActive($lineId)
    {
        Line::where('active', true)->update(['active' => false]);

        Line::where('id', $lineId)->update(['active' => true]);

        return redirect(route('home'))->with('status', 'Активная строка изменена');
    }
}
