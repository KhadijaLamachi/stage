<?php

namespace App\Http\Controllers;
use App\Models\Utilisateur;
use App\Models\Evenement;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    
    // public function index()
    // {
    //     $isAdmin = false;
    //     if (auth()->check()) {
    //         $isAdmin = auth()->user()->isAdmin();
    //     }

    //     return view('admin.index', compact('isAdmin'));
    // }
    public function index()
    {
        $evenements = Evenement::all();
        $employes = Utilisateur::where('role', 'Employé')->get();
        $isAdmin = false;
        $user = auth()->user();
        if ($user instanceof Utilisateur) {
            $isAdmin = $user->isAdmin();
        }

        return view('admin.index', compact('isAdmin', 'evenements','employes'));
    }



    public function manageEmployes()
    {
        $employes = Utilisateur::where('role', 'Employé')->get();
        return view('admin.employes', compact('employes'));
    }


    

    public function manageEvents()
    {
        $evenements = Evenement::all();
        return view('admin.evenements', compact('evenements'));
    }

}
