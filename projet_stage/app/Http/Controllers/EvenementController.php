<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Inscription;
use App\Models\Utilisateur;
use App\Events\formInscriptionEvent;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $events = Evenement::paginate(6);
        return view('accueil', ['events' => $events]);
        // return view('accueil');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $domaines = Evenement::distinct()->pluck('domaines_cibles')->flatten()->unique();
        $posts = Evenement::distinct()->pluck('posts_cibles')->flatten()->unique();
        
        // Convert comma-separated values to arrays
        $domaines = collect($domaines)->flatMap(function ($domaine) {
            return explode(',', $domaine);
        })->unique();
    
        $posts = collect($posts)->flatMap(function ($post) {
            return explode(',', $post);
        })->unique();
    
        return view('event.create', compact('domaines', 'posts'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'domaines_cibles' => 'required|array',
            'posts_cibles' => 'required|array',
            'image' => 'required|file|image|mimes:jpeg,png',
        ]);
    
        // Ensure domaines_cibles and posts_cibles are arrays
        $validatedData['domaines_cibles'] = is_array($validatedData['domaines_cibles']) ? $validatedData['domaines_cibles'] : [];
        $validatedData['posts_cibles'] = is_array($validatedData['posts_cibles']) ? $validatedData['posts_cibles'] : [];
    
        // Create new Evenement
        Evenement::create($validatedData);
    
        return redirect()->route('admin.evenements')->with('success', 'Evenement created successfully');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Evenement::find($id);
        $isRegistered = auth()->check() && $event->inscriptions->contains('utilisateur_id', auth()->id());
        $domaines = Evenement::distinct()->pluck('domaines_cibles')->flatten()->unique();
        $posts = Evenement::distinct()->pluck('posts_cibles')->flatten()->unique();
        
        // Convert comma-separated values to arrays
        $domaines = collect($domaines)->flatMap(function ($domaine) {
            return explode(',', $domaine);
        })->unique();
    
        $posts = collect($posts)->flatMap(function ($post) {
            return explode(',', $post);
        })->unique();
        
        return view('show', compact('event','isRegistered','domaines','posts'));
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Evenement::find($id);
        $domaines = Utilisateur::distinct()->pluck('domaine')->flatten()->unique();
        $posts = Utilisateur::distinct()->pluck('post')->flatten()->unique();

        // Convert comma-separated values to arrays
        $domaines = collect($domaines)->flatMap(function ($domaine) {
            return explode(',', $domaine);
        })->unique();

        $posts = collect($posts)->flatMap(function ($post) {
            return explode(',', $post);
        })->unique();

        return view('event.edit', compact('event', 'domaines', 'posts'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $event = Evenement::find($id);
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'domaines_cibles' => 'required|array',
            'posts_cibles' => 'required|array',
            'image' => 'required|file|image|mimes:jpeg,png',
        ]);
        
        $event->update($validatedData);

        return redirect()->route('admin.evenements')->with('success', 'Evenements updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the employee by ID
        $event = Evenement::find($id);

        // Check if the employee exists
        if (!$event) {
            return back()->with('error', 'event not found');
        }

        // Delete all inscriptions associated with the employee
        $event->inscriptions()->delete();

        // Delete the employee
        $event->delete();

        return back()->with('success', 'event deleted successfully');
    }

    public function registerInEvent(string $id)
    {
        // Check if user is authenticated
        if (auth()->check()) {
            // Check if user is not an admin (assuming admins have role 'Administrateur')
            if (auth()->user()->role !== 'Administrateur') {
                // User is not admin, proceed with registration
                $inscription = new Inscription;
                $inscription->utilisateur_id = auth()->id(); // id of the authenticated user
                $inscription->evenement_id = $id;
                $inscription->save();

                // Set success message in session
                session()->flash('success', 'You have successfully registered for the event.');

                // Return a redirect back to the same page
                return back();
            }
        }

        // User is not authenticated or is an admin, return an error response
        return redirect('/login')->with('danger', 'You have to login first.');
    }


    public function cancelRegistration(string $id)
    {
        $inscription = Inscription::where('utilisateur_id', auth()->id())
                                    ->where('evenement_id', $id)
                                    ->first();

        if ($inscription) {
            $inscription->delete();
            session()->flash('success', 'You have successfully canceled your registration.');
            return back();
        }

        return response()->json(['message' => 'error']);
    }






    // public function registerInEvent(string $id)
    // {
    //     $inscription = new Inscription;
    //     $inscription->utilisateur_id = $id; // id de l'utilisateur authentifier
    //     $inscription->evenement_id = $id;
    //     $utilisateur = Utilisateur::find($inscription->utilisateur_id);
    //     $inscription->utilisateur()->save($utilisateur);
    //     $evenement = Evenement::find($inscription->evenement_id);
    //     $inscription->evenement()->save($evenement);
    //     return redirect('/show'); 
            
    // }
}