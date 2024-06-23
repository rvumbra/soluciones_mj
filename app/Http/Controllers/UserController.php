<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        return view('userList.table', [
            'users' => User::all()
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        User::create([
            'name' => $validatedData['name'],
            'lastname' => $request->lastname,
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('userList.table')->with('status', 200);
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
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Asegura que el email sea único, ignorando el usuario actual
        ]);

        $user = User::find($id);

        if($user):
            $user->name = $validatedData['name'];
            $user->lastname = $request->lastname;
            $user->email = $validatedData['email'];
            $user->save();

            return redirect()->route('userList.table')->with('status', 201);
        else:
            return response()->json(['message' => 'No se ha encontrado el usuario'], 500);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if($user):
            $user->delete();
            return redirect()->route('userList.table')->with('status', 201);
        else:
            return response()->json(['message' => 'No se ha encontrado el usuario'], 500);
        endif;
    }
}
