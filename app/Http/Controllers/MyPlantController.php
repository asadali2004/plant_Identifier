<?php
namespace App\Http\Controllers;

use App\Models\Plant;

class MyPlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all(); // In real apps, you would filter by user
        return view('myplants.index', compact('plants'));
    }
}



