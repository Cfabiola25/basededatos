<?php

namespace App\Http\Controllers\v1\Agenda; 

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgendaController extends Controller
{
    public function index()
    {
        return response()->json(Agenda::all(), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $agenda = Agenda::create($validator->validated());

        return response()->json($agenda, 201);
    }

    public function show(Agenda $agenda)
    {
        return response()->json($agenda, 200);
    }

    public function update(Request $request, Agenda $agenda)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $agenda->update($validator->validated());

        return response()->json($agenda, 200);
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return response()->json(null, 204);
    }
}
