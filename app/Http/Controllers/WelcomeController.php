<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $projets = Projet::with('tasks')->get();
        return view("welcome", compact('projets'));
    }
}
