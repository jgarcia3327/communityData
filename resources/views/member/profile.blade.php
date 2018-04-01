@extends('layouts.app')

@section('html_title', " Add Member")

<?php 
    $profile = $profile_array[0];
    $address = $profile_array[1];
?>

@section('content')
@if($profile != null)
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                @if (Auth::user()->id == $profile->user_id)
                <h3>My Data</h3>
                @else 
                <h3>{{$profile->lname}}, {{$profile->fname}} {{$profile->mname}}</h3>
                @endif
                </div>

<!--                 <form action="{{ url('member') }}" method="POST"> -->
<!--                   {{ csrf_field() }} -->
                  <div class="panel-body">

                      <!-- Name -->
                      <h4>Name</h4>
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="lname">*Last Name</label>
                              <input type="text" class="form-control" id="lname" name="lname" value="{{$profile->lname}}" disabled>
                              <!-- <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fname">*Given Name</label>
                              <input type="text" class="form-control" id="fname" name="fname" value="{{$profile->fname}}" disabled>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="mname">Middle Name</label>
                              <input type="text" class="form-control" id="mname" name="mname" value="{{$profile->mname}}" disabled>
                            </div>
                          </div>
                      </div>

                      <hr/>

                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="nname">Nick Name</label>
                              <input type="text" class="form-control" id="nname" name="nname" value="{{$profile->nname}}" disabled>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="mnumber">Mobile Number</label>
                              <input type="text" class="form-control" id="mnumber" name="mnumber" value="{{$profile->mnumber}}" disabled>
                              <label for="lnumber">Landline Number</label>
                              <input type="text" class="form-control" id="lnumber" name="lnumber" value="{{$profile->lnumber}}" disabled>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="email">Email Address</label>
                              <input type="text" class="form-control" id="email" name="email" value="{{$profile->email != null? $profile->email : ''}}" disabled>
                            </div>
                          </div>
                      </div>

                      <hr/>

                      <!-- Birth -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="dob">Birth Date (yyyy-mm-dd)</label>
                            <input type="text" class="form-control" id="dob" name="dob" value="{{$profile->dob}}" disabled>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="pob">Birth Place</label>
                            <input type="text" class="form-control" id="pob" name="pob" value="{{$profile->pob}}" disabled>
                          </div>
                        </div>
                      </div>

                      <hr/>

                      <!-- Address (Present)-->
                      <h4>Present Address</h4>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="house_street">House No. and Street</label>
                            <input type="text" class="form-control" id="house_street" name="house_street[0]" value="{{$address[0]->house_street}}" disabled>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="sitio">Sitio/Purok/Zone</label>
                            <input type="text" class="form-control" id="sitio" name="sitio[0]" value="{{$address[0]->sitio}}" disabled>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="pob">Zip Code</label>
                            <input type="text" class="form-control" id="zip" name="zip[0]" value="{{$address[0]->zip}}" disabled>
                          </div>
                        </div>
                      </div>

                      <!-- Address (Provincial)-->
                      <h4>Provincial Address</h4>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="house_street">House No. and Street</label>
                            <input type="text" class="form-control" id="house_street" name="house_street[1]" value="{{$address[1]->house_street}}" disabled>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="sitio">Sitio/Purok/Zone</label>
                            <input type="text" class="form-control" id="sitio" name="sitio[1]" value="{{$address[1]->sitio}}" disabled>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="pob">Zip Code</label>
                            <input type="text" class="form-control" id="zip" name="zip[1]" value="{{$address[1]->zip}}" disabled>
                          </div>
                        </div>
                      </div>

                      <hr/>

                      <!-- Status -->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="sector">Sector</label>
                            <input type="text" class="form-control" id="sector" name="sector" value="{{$profile->sector}}" disabled>
                          </div>
                          <div class="form-group">
                            <label for="civil_status">Civil Status</label>
                            <input type="text" class="form-control" id="civil_status" name="civil_status" value="{{$profile->civil_status}}" disabled>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="pwd_disability">If PWD, what type of Disability?</label>
                            <input type="text" class="form-control" id="pwd_disability" name="pwd_disability" value="{{$profile->pwd_disability}}" disabled>
                          </div>
                          <div class="form-group">
                            <label for="num_children">Number of Children</label>
                            <input type="number" class="form-control" id="num_children" name="num_children" value="{{$profile->num_children}}" disabled>
                            <label for="num_dependents">Number of Dependents</label>
                            <input type="number" class="form-control" id="num_dependents" name="num_dependents" value="{{$profile->num_dependents}}" disabled>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="pwd_id">PWD ID Number</label>
                            <input type="text" class="form-control" id="pwd_id" name="pwd_id" value="{{$profile->pwd_id}}" disabled>
                            <label for="senior_id">Senior Citizens ID Number</label>
                            <input type="text" class="form-control" id="senior_id" name="senior_id" value="{{$profile->senior_id}}" disabled>
                            <label for="solo_parent_id">Solo Parent ID Number</label>
                            <input type="text" class="form-control" id="solo_parent_id" name="solo_parent_id" value="{{$profile->solo_parent_id}}" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-7">
                          <div class="form-group">
                            <label for="religion">Religion</label>
                            <input type="text" class="form-control" id="religion" name="religion" value="{{$profile->religion}}" disabled>
                          </div>
                        </div>
                        <div class="col-md-5">

                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="right-q" for="religion">Education Attainment:</label>
                            <label class="radio-inline">
                              <input type="radio" name="education" value="0" disabled {{$profile->education == 0? "checked" : ""}}> Post Graduate
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="education" value="1" disabled {{$profile->education == 1? "checked" : ""}}> Graduate
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="education" value="2" disabled {{$profile->education == 2? "checked" : ""}}> HighSchool
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="education" value="3" disabled {{$profile->education == 3? "checked" : ""}}> Elementary
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="right-q" for="occupation">Occupation:</label>
                              <label class="radio-inline">
                                <input type="radio" name="occupation" value="0" disabled {{$profile->occupation == 0? "checked" : ""}}> Employed
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="occupation" value="1" disabled {{$profile->occupation == 1? "checked" : ""}}> Self Employed
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="occupation" value="2" disabled {{$profile->occupation == 2? "checked" : ""}}> Unemployed
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="occupation" value="3" disabled {{$profile->occupation == 3? "checked" : ""}}> Business Owner
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="right-q" for="income">Income:</label> <br/>
                                <div class="radio"><label>
                                  <input type="radio" name="income" value="0" disabled {{$profile->income == 0? "checked" : ""}}> Above Minimum Wage
                                </label></div>
                                <div class="radio"><label>
                                  <input type="radio" name="income" value="1" disabled {{$profile->income == 1? "checked" : ""}}> Minimum Wage
                                </label></div>
                                <div class="radio"><label class="radio">
                                  <input type="radio" name="income" value="2" disabled {{$profile->income == 2? "checked" : ""}}> Below Minimum Wage
                                </label></div>
                                <strong class="float-left"><i>*Minimum Wage is Php 366.00 Daily</i></strong>
                              </div>
                            </div>
                        </div>

                        <br/>
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="num_earners">Number of Household Earners</label>
                                <input type="number" class="form-control" id="num_earners" name="num_earners" value="{{$profile->num_earners}}" disabled>
                                <label for="total_income_month">Total Household Income Per Month</label>
                                <input type="text" class="form-control" id="total_income_month" name="total_income_month" value="{{$profile->total_income_month}}" disabled>
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group">
                                <label class="right-q" for="med_insurance">Are you a member of any Health/Medical Insurance?</label>
                                <label class="radio-inline">
                                  <input type="radio" name="med_insurance" value="1" disabled {{$profile->med_insurance == 1? "checked":""}}> Yes
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="med_insurance" value="0" disabled {{$profile->med_insurance == 0? "checked":""}}> No
                                </label>
                              </div>
                            </div>
                          </div>

                          <hr/>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="right-q" for="nature_occupancy">Nature of Household Occupancy:</label>
                                <label class="radio-inline">
                                  <input type="radio" name="nature_occupancy" value="0" disabled {{$profile->nature_occupancy == 0? "checked":""}}> House and Lot Owner
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="nature_occupancy" value="1" disabled {{$profile->nature_occupancy == 1? "checked":""}}> Renter
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="nature_occupancy" value="2" disabled {{$profile->nature_occupancy == 2? "checked":""}}> Informal Settler
                                </label>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="right-q" for="is_voter">Are you a REGISTERED VOTER? </label>
                                <label class="radio-inline">
                                  <input type="radio" name="is_voter" value="1" disabled {{$profile->is_voter == 1? "checked":""}}> YES
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="is_voter" value="0" disabled {{$profile->is_voter == 0? "checked":""}}> NO
                                </label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="last_vote">If YES, when was the last time you voted?</label>
                                <input type="text" class="form-control" id="last_vote" name="last_vote" value="{{$profile->last_vote}}" disabled>
                              </div>
                            </div>
                          </div>

                          <hr/>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="sector_president_id">SECTOR PRESIDENT</label>
                                <select id="sector_president_id" name="sector_president_id" disabled>
                                  <?php 
                        				$encoders = Common::getSectorPresidents();
                        			  ?>
                        				@if (count($encoders) <= 0) 
                        					<option></option>
                        				@else
                        					<option></option>
                    						@foreach($encoders AS $v)
                    						<option value="{{$v->id}}" {{$profile->sector_president_id == $v->id? "selected" : ""}}>{{$v->lname}}, {{$v->fname}} {{$v->mname}}</option>
                    						@endforeach
                        				@endif
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12 submit-btn-container">
                              <a href="{{url('member/'.$profile->user_id.'/edit')}}" class="btn btn-lg btn-primary"> Edit </a>
                            </div>
                          </div>

                    </div>
<!--                 </form> -->
            </div>
        </div>
    </div>
</div>
@else
<i class="text-danger">No Records Found.</i>
@endif
@endsection
