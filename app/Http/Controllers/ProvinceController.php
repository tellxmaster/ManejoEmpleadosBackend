<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function list()
    {
        $provinces = Province::all();
        return response()->json($provinces);
    }
}