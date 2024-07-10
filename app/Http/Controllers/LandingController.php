<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class LandingController extends Controller
{
    /**
     * Display the landing page.
     */
    public function index()
    {
        return view('landing.home');
    }


    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $result = Room::where('room_type', 'like', '%'.$keyword.'%')->get();

        return view('landing.search',['result' => $result]);
    }

    /**
     * Display the rooms page.
     */
    public function rooms()
    {
        return view('landing.rooms');
    }

    public function room_details()
    {
        return view('landing.room_details');
    }
    
    /**
     * Display the about us page.
     */
    public function about_us()
    {
        return view('landing.about_us');
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('landing.contact');
    }

    /**
     * Display the available.
     */
    public function available()
    {
        return view('landing.available');
    }

    /**
     * Display the login page.
     */
    public function login()
    {
        return view('landing.login');
    }

    /**
     * Display the register page.
     */
    public function register()
    {
        return view('landing.register');
    }

    // The rest of the resource methods can remain as they are, or you can customize them as needed.

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
