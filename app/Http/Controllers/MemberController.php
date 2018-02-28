<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use App\Models\GovernmentID;
use App\Models\Household;
use App\Models\Member;
use App\Models\Status;
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
        dd("DASHBOARD TODO...");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type == CommonController::USER_MEMBER) return redirect('');
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
        
        if (Auth::user()->type == CommonController::USER_MEMBER && Auth::user()->id != $id) return redirect('');
        
        $profile = User::select("users.*","members.*","government_ids.*", "households.*", "status.*");
        $profile = $profile->leftJoin("members","members.user_id","=","users.id");
        $profile = $profile->leftJoin("government_ids","government_ids.user_id","=","users.id");
        $profile = $profile->leftJoin("households","households.user_id","=","users.id");
        $profile = $profile->leftJoin("status","status.user_id","=","users.id");
        //$profile = $profile->where("members.user_id",Auth::user()->id)->first();
        $profile = $profile->where("members.user_id",$id)->first();
        //$address = Address::where("user_id", Auth::user()->id)->get();
        $address = Address::where("user_id", $id)->get();
        //dd($address);
        //dd($profile);
        $profile_array = array($profile, $address);
        return view('member.profile', compact("profile_array"));
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
        return view("member.edit");
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
    
    public function create_admin() {
        //dd("ADMIN");
        if (Auth::user()->type != CommonController::USER_ADMIN) return redirect('');
        return view ("member.create_admin");
    }
    public function create_admin_store(Request $request) {
        //dd($request->all());
        if (Auth::user()->type != CommonController::USER_ADMIN) return redirect('');
        User::where("id", $request->user_id)->Update(["type" => CommonController::USER_ADMIN]);
        $member = User::where("users.id", $request->user_id)->leftJoin("members","members.user_id","=","users.id")->first();
        return back()->with('success', $member->lname.", ".$member->fname." ".$member->mname." has been successfully added as ADMIN!");
    }
    public function remove_admin(Request $request) {
        //dd($request->all());
        if (Auth::user()->type != CommonController::USER_ADMIN) return redirect('');
        User::where("id", $request->user_id)->Update(["type" => CommonController::USER_MEMBER]);
        return back()->with('success', $request->complete_name." has been successfully removed as ADMIN!");
    }
    
    public function create_sector_president() {
        //dd("PRES");
        if (Auth::user()->type != CommonController::USER_ADMIN) return redirect('');
        return view ("member.create_sector_president");
    }
    public function create_sector_president_store(Request $request) {
        //dd($request->all());
        if (Auth::user()->type != CommonController::USER_ADMIN) return redirect('');
        User::where("id", $request->user_id)->Update(["type" => CommonController::USER_SECTOR_PRESIDENT]);
        $member = User::where("users.id", $request->user_id)->leftJoin("members","members.user_id","=","users.id")->first();
        return back()->with('success', $member->lname.", ".$member->fname." ".$member->mname." has been successfully added as SECTOR PRESIDENT!");
    }
    public function remove_sector_president(Request $request) {
        //dd($request->all());
        if (Auth::user()->type != CommonController::USER_ADMIN) return redirect('');
        User::where("id", $request->user_id)->Update(["type" => CommonController::USER_MEMBER]);
        return back()->with('success', $request->complete_name." has been successfully removed as SECTOR PRESIDENT!");
    }
    
    public function create_encoder() {
        //dd("ENCODER");
        if (Auth::user()->type == CommonController::USER_MEMBER || Auth::user()->type == CommonController::USER_ENCODER) return redirect('');
        return view ("member.create_encoder");
    }
    public function create_encoder_store(Request $request) {
        //dd($request->all());
        if (Auth::user()->type == CommonController::USER_MEMBER || Auth::user()->type == CommonController::USER_ENCODER) return redirect('');
        User::where("id", $request->user_id)->Update(["type" => CommonController::USER_ENCODER]);
        $member = User::where("users.id", $request->user_id)->leftJoin("members","members.user_id","=","users.id")->first();
        return back()->with('success', $member->lname.", ".$member->fname." ".$member->mname." has been successfully added as ENCODER!");
    }
    public function remove_encoder(Request $request) {
        //dd($request->all());
        if (Auth::user()->type == CommonController::USER_MEMBER || Auth::user()->type == CommonController::USER_ENCODER) return redirect('');
        User::where("id", $request->user_id)->Update(["type" => CommonController::USER_MEMBER]);
        return back()->with('success', $request->complete_name." has been successfully removed as ENCODER!");
    }
}
