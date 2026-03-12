<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Member;

class MemberRegistrationController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Member Registration Page
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $team_id = $request->query('team_id');

        if (!$team_id) {
            return redirect('/')->with('error', 'Please scan your team\'s QR code to register as a member.');
        }

        $team = Team::with('captain')->find($team_id);

        if (!$team) {
            return redirect('/')->with('error', 'Invalid team QR code.');
        }

        return view('mlbb.register-member', compact('team'));
    }

    /*
    |--------------------------------------------------------------------------
    | Store Member
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {

        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'member_name' => 'required',
            'member_birthday' => 'required',
            'member_age' => 'required|numeric',
            'member_address' => 'required',
            'member_id_image' => 'required|image',
            'ml_id' => 'required',
            'server' => 'required',
            'ml_username' => 'required',
            'role' => 'required',
            'member_selfie' => 'required|image'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Save Member ID to External Volume
        |--------------------------------------------------------------------------
        */

        $image = $request->file('member_id_image');

        $imageName = 'member_'.time().'.'.$image->getClientOriginalExtension();

        $savePath = '/mnt/volume-sgp1-01/pml-portal-ids/member/' . $imageName;

        $image->move('/mnt/volume-sgp1-01/pml-portal-ids/member', $imageName);

        /*
        |--------------------------------------------------------------------------
        | Save Member Selfie to External Volume
        |--------------------------------------------------------------------------
        */

        $selfieImage = $request->file('member_selfie');
        $selfieName = 'member_selfie_'.time().'.'.$selfieImage->getClientOriginalExtension();
        $selfiePath = '/mnt/volume-sgp1-01/pml-selfies/' . $selfieName;
        $selfieImage->move('/mnt/volume-sgp1-01/pml-selfies', $selfieName);

        /*
        |--------------------------------------------------------------------------
        | Create Member
        |--------------------------------------------------------------------------
        */

        Member::create([
            'team_id' => $request->team_id,
            'full_name' => $request->member_name,
            'birthday' => $request->member_birthday,
            'age' => $request->member_age,
            'address' => $request->member_address,
            'id_image' => $savePath,
            'ml_id' => $request->ml_id,
            'server' => $request->server,
            'ml_username' => $request->ml_username,
            'role' => $request->role,
            'selfie_image' => $selfiePath
        ]);

        return redirect('/')->with('success','Member Registered Successfully');

    }
}