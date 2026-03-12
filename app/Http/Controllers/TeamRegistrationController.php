<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\TeamCaptain;

class TeamRegistrationController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Team Registration Page
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('mlbb.register-team');
    }

    /*
    |--------------------------------------------------------------------------
    | Register Member Page
    |--------------------------------------------------------------------------
    */

    public function registerMember()
    {
        return view('mlbb.register-member');
    }

    /*
    |--------------------------------------------------------------------------
    | Store Team + Captain
    |--------------------------------------------------------------------------
    */

    public function storeTeam(Request $request)
    {

        $request->validate([
            'team_name' => 'required',
            'team_logo' => 'required|image|mimes:png',
            'barangay' => 'required',
            'captain_name' => 'required',
            'captain_birthday' => 'required',
            'captain_age' => 'required|numeric',
            'captain_address' => 'required',
            'captain_id_image' => 'required|image',
            'captain_selfie' => 'required|image'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Save Team Logo to External Volume
        |--------------------------------------------------------------------------
        */

        $logoImage = $request->file('team_logo');
        $logoName = 'team_logo_' . time() . '_' . uniqid() . '.png';
        $logoPath = '/mnt/volume-sgp1-01/pml-logos/' . $logoName;
        $logoImage->move('/mnt/volume-sgp1-01/pml-logos', $logoName);

        /*
        |--------------------------------------------------------------------------
        | Create Team First (needed for team ID)
        |--------------------------------------------------------------------------
        */

        $team = Team::create([
            'team_name' => $request->team_name,
            'team_logo' => $logoPath,
            'barangay' => $request->barangay
        ]);

        /*
        |--------------------------------------------------------------------------
        | Save Captain ID to External Volume
        |--------------------------------------------------------------------------
        */

        $image = $request->file('captain_id_image');

        $imageName = 'captain_'.$team->id.'_'.time().'.'.$image->getClientOriginalExtension();

        $savePath = '/mnt/volume-sgp1-01/pml-portal-ids/captain/' . $imageName;

        $image->move('/mnt/volume-sgp1-01/pml-portal-ids/captain', $imageName);

        /*
        |--------------------------------------------------------------------------
        | Save Captain Selfie to External Volume
        |--------------------------------------------------------------------------
        */

        $selfieImage = $request->file('captain_selfie');
        $selfieName = 'captain_selfie_'.$team->id.'_'.time().'.'.$selfieImage->getClientOriginalExtension();
        $selfiePath = '/mnt/volume-sgp1-01/pml-selfies/' . $selfieName;
        $selfieImage->move('/mnt/volume-sgp1-01/pml-selfies', $selfieName);

        /*
        |--------------------------------------------------------------------------
        | Create Captain
        |--------------------------------------------------------------------------
        */

        TeamCaptain::create([
            'team_id' => $team->id,
            'full_name' => $request->captain_name,
            'birthday' => $request->captain_birthday,
            'age' => $request->captain_age,
            'address' => $request->captain_address,
            'id_image' => $savePath,
            'selfie_image' => $selfiePath
        ]);

        return redirect('/')->with('success','Team Registered Successfully');

    }

}