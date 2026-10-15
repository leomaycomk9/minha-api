<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request){
       
    $data = $request->validate([
        'title' => 'required|min:3|max:255',
        'description' => 'required',
        'priority' => 'required|string',
        'category' => 'required|string'
       ]);

       $ticket = Ticket::create($data);

       return response()->json([
        'message' => 'registro criado com sucesso!',
        'data' => $ticket,
       ], 201);
    }
}
