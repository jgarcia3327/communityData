<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Address;
use App\GovernmentID;
use App\HouseHold;
use App\Member;
use App\Status;
use Carbon\Carbon;
use App\Http\Controllers\CommonController;
use Auth;

class MemberController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        dd("TODO");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // REGISTER USER
        // Random register password
        $passwordRand = CommonController::generateRandomString(12);
        $user_data = array(
          "email" => empty($request->email)? null : $request->email,
          "password" => bcrypt($passwordRand)
        );
        $user_id = User::create($user_data)->id;

        // Add user_id from $request
        $request->request->add(['user_id' => $user_id]);
        // Add encoder_id
        $request->request->add(['encoder_id' => Auth::user()->id]);

        // ADD MEMBER DATA
        $member_id = Member::create($request->all())->id;

        // ADD ADDRESS DATA
        // Current address
        $address_data = array(
          "user_id" => $user_id,
          "type" => 0,
          "house_street" => $request->house_street[0],
          "sitio" => $request->sitio[0],
          "zip" => $request->zip[0]
        );
        $current_address_id = Address::create($address_data)->id;
        // Provincial address
        $address_data = array(
          "user_id" => $user_id,
          "type" => 1,
          "house_street" => $request->house_street[1],
          "sitio" => $request->sitio[1],
          "zip" => $request->zip[1]
        );
        $provincial_address_id = Address::create($address_data)->id;

        // ADD GOVERNMENT IDS DATA
        $govenmentID_id = GovernmentID::create($request->all())->id;

        // ADD HOUSEHOLD DATA
        $household_id = Household::create($request->all())->id;

        // ADD STATUS DATA
        $status_id = Status::create($request->all())->id;

        return back()->with('success', $request->lname.", ".$request->fname." ".$request->mname." has been successfull added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
