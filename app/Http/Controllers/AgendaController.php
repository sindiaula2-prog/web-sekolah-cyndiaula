<?php

namespace App\Http\Controllers;

use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::latest()->paginate(9);

        return view('agenda', compact('agendas'));
    }
}