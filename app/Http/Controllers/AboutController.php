<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentang;
class AboutController extends Controller
{
    public function index()
    {
        $tentang = Tentang::all();
        return view('about.index', compact('tentang'));
    }
}
