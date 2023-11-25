<?php

namespace App\Http\Controllers;

use App\Models\Armor;
use Illuminate\Http\Request;

class ArmorController extends Controller
{
    public function index() {

        $armors = Armor::limit(100)->get();
        return view('armors', compact('armors'));
    }
}
