<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Requests\UtilisateurStoreRequest;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // All Posts
        $users = Utilisateur::all();

        // Return Json Response
        return response()->json([
            'Utilisateurs' => $users
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UtilisateurStoreRequest $request)
    {
        try {


            // Create Post
            Utilisateur::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom
            ]);

            // Return Json Response
            return response()->json([
                'message' => "User successfully created."
            ], 200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Post Detail 
        $user = Utilisateur::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'user Not Found.'
            ], 404);
        }

        // Return Json Response
        return response()->json([
            'utilisateur' => $user
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        try {
            // Find Post
            $user = Utilisateur::find($id);
            if (!$user) {
                return response()->json([
                    'message' => 'User Not Found.'
                ], 404);
            }

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;


        // Update Post
        $user->save();

        // Return Json Response
        return response()->json([
            'message' => "user successfully updated."
        ], 200);
        
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Post Detail 
        $user = Utilisateur::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'user Not Found.'
            ], 404);
        }


        // Delete Post
        $user->delete();

        // Return Json Response
        return response()->json([
            'message' => "user successfully deleted."
        ], 200);
    }
}
