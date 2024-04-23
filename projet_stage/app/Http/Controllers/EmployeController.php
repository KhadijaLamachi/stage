<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;


class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('employe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'cin' => 'required|string',
        'email' => 'required|email|unique:utilisateurs',
        'password' => 'required|string|min:8', // Add password validation
        'telephone' => 'required|string',
        'role' => 'required|string|in:Employé,Administrateur',
        'post' => 'required|string',
        'domaine' => 'required|string',
    ]);

    // Hash the password
    $validatedData['password'] = bcrypt($validatedData['password']);

    // Create new utilisateur
    Utilisateur::create($validatedData);

    return redirect()->route('admin.employes')->with('success', 'Employee created successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $employe = Utilisateur::find($id);
        return view('employe.show',compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $employe = Utilisateur::find($id);
        return view('employe.edit', compact('employe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $employe)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'cin' => 'required|string',
            'email' => 'required|email|unique:utilisateurs,email,' . $employe->id,
            'telephone' => 'required|string',
            'role' => 'required|string|in:Employé,Administrateur',
            'post' => 'required|string',
            'domaine' => 'required|string',
        ]);

        $employe->update($validatedData);

        return redirect()->route('admin.employes')->with('success', 'Employee updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the employee by ID
        $employe = Utilisateur::find($id);

        // Check if the employee exists
        if (!$employe) {
            return back()->with('error', 'Employee not found');
        }

        // Delete all inscriptions associated with the employee
        $employe->inscriptions()->delete();

        // Delete the employee
        $employe->delete();

        return back()->with('success', 'Employee deleted successfully');
    }


}
