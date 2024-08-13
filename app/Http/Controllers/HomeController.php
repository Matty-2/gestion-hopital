<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Doctor;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $doctors = Doctor::all();

        return view('home', compact('services', 'doctors'));
    }
}
