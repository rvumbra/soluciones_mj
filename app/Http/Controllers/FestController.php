<?php

namespace App\Http\Controllers;

use App\Models\Fest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FestController extends Controller
{
    /**
     * Crea una nueva instancia del controllador.
     *
     * Aplica el middleware de autorización.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fests = Fest::all();

        return view('festList.table', [
            'fests' => $fests,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|string|max:255',
            'color'=>'required|string',
            'date'=>'required|date'
        ]);

        Fest::create([
            'name' => $validatedData['name'],
            'color' => $validatedData['color'],
            'date' => $validatedData['date'],
            'recurrent' => $request->recurrent
        ]);

        return redirect()->route('festList.table')->with('status', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name'=>'required|string|max:255',
            'color'=>'required|string',
            'date'=>'required|date'
        ]);

        $fest = Fest::find($id);

        if($fest):
            $fest->name = $validatedData['name'];
            $fest->color = $validatedData['color'];
            $fest->date = $validatedData['date'];
            $fest->recurrent = $request->recurrent;
            $fest->save();

            return response()->json(['message' => 'Usuario actualizado'], 201);
        else:
            return response()->json(['message' => 'No se ha encontrado el usuario'], 500);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fest = Fest::find($id);

        if($fest):
            $fest->delete();
            return response()->json(['message' => 'Usuario actualizado'], 201);
        else:
            return response()->json(['message' => 'No se ha encontrado el usuario'], 500);
        endif;
    }

    /**
     * Obtiene los días festivos para pasarlos al calendar principal.
     */
    public function getFestToCalendar()
    {
        $data = [];
        $fests = Fest::all();

        foreach ($fests as $fest) {
            if ($fest->recurrent) {
                // Día festivo recurrente cada año en un intervalo de 200 años.
                for ($year = date('Y') - 100; $year <= date('Y') + 100; $year++) {
                    $data[] = [
                        'startDate' => $year . '-' . date('m-d', strtotime($fest->date)),
                        'endDate' => $year . '-' . date('m-d', strtotime($fest->date)),
                        'name' => $fest->name,
                        'color' => $fest->color,
                    ];
                }
            } else {
                // Día festivo para un año específico
                $data[] = [
                    'startDate' => $fest->date,
                    'endDate' => $fest->date,
                    'name' => $fest->name,
                    'color' => $fest->color,
                ];
            }
        }

        return response()->json($data);
    }
}
