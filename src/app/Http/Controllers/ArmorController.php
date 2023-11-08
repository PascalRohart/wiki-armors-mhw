<?php

namespace App\Http\Controllers;

use App\Models\Armor;
use Illuminate\Http\Request;

class ArmorController extends Controller
{
    public function index() {
        $armor = Armor::find(1);

        return view("index",compact('armor'));
    }
}
