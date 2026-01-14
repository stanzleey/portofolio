<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keahlian;
class KeahlianController extends Controller
{
    //
     public function index()
    {
        $keahlians = Keahlian::orderBy('urutan', 'asc')->get();
        return view('keahlian.index', compact('keahlians'));
    }
}
