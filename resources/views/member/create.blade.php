@extends('layouts.app')

@section('html_title', " Add Member")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Member</div>

                <form action="{{ url('member') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="panel-body">

                    @if (!empty(session('success')))
                      <h3><i class="text-success">{{{session('success')}}}</i></h3>
                    @endif

                      <!-- Name -->
                      <div class="row">
                          <h3>Name</h3>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="lname">*Last Name</label>
                              <input type="text" class="form-control" id="lname" name="lname" aria-describedby="nameHelp" required>
                              <!-- <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="fname">*Given Name</label>
                              <input type="text" class="form-control" id="fname" name="fname" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="mname">Middle Name</label>
                              <input type="text" class="form-control" id="mname" name="mname">
                            </div>
                          </div>
                      </div>

                      <hr/>

                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="nname">Nick Name</label>
                              <input type="text" class="form-control" id="nname" name="nname">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="mnumber">Mobile Number</label>
                              <input type="text" class="form-control" id="mnumber" name="mnumber">
                              <label for="lnumber">Landline Number</label>
                              <input type="text" class="form-control" id="lnumber" name="lnumber">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="email">Email Address</label>
                              <input type="text" class="form-control" id="email" name="email" value="">
                            </div>
                          </div>
                      </div>

                      <hr/>

                      <!-- Birth -->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="dob">Birth Date (yyyy-mm-dd)</label>
                            <input type="text" class="form-control" id="dob" name="dob">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="pob">Birth Place</label>
                            <input type="text" class="form-control" id="pob" name="pob">
                          </div>
                        </div>
                      </div>

                      <hr/>

                      <!-- Address (Present)-->
                      <div class="row">
                        <h3>Present Address</h3>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="house_street">House No. and Street</label>
                            <input type="text" class="form-control" id="house_street" name="house_street[0]">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="sitio">Sitio/Purok/Zone</label>
                            <input type="text" class="form-control" id="sitio" name="sitio[0]">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="pob">Zip Code</label>
                            <input type="text" class="form-control" id="zip" name="zip[0]">
                          </div>
                        </div>
                      </div>

                      <!-- Address (Provincial)-->
                      <div class="row">
                        <h3>Provincial Address</h3>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="house_street">House No. and Street</label>
                            <input type="text" class="form-control" id="house_street" name="house_street[1]">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="sitio">Sitio/Purok/Zone</label>
                            <input type="text" class="form-control" id="sitio" name="sitio[1]">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="pob">Zip Code</label>
                            <input type="text" class="form-control" id="zip" name="zip[1]">
                          </div>
                        </div>
                      </div>

                      <hr/>

                      <!-- Status -->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="sector">Sector</label>
                            <input type="text" class="form-control" id="sector" name="sector">
                          </div>
                          <div class="form-group">
                            <label for="civil_status">Civil Status</label>
                            <input type="text" class="form-control" id="civil_status" name="civil_status">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="pwd_disability">If PWD, what type of Disability?</label>
                            <input type="text" class="form-control" id="pwd_disability" name="pwd_disability">
                          </div>
                          <div class="form-group">
                            <label for="num_children">Number of Children</label>
                            <input type="number" class="form-control" id="num_children" name="num_children">
                            <label for="num_dependencies">Number of Dependents</label>
                            <input type="number" class="form-control" id="num_dependencies" name="num_dependencies">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="pwd_id">PWD ID Number</label>
                            <input type="text" class="form-control" id="pwd_id" name="pwd_id">
                            <label for="senior_id">Senior Citizens ID Number</label>
                            <input type="text" class="form-control" id="senior_id" name="senior_id">
                            <label for="solo_parent_id">Solo Parent ID Number</label>
                            <input type="text" class="form-control" id="solo_parent_id" name="solo_parent_id">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-7">
                          <div class="form-group">
                            <label for="religion">Religion</label>
                            <input type="text" class="form-control" id="religion" name="religion">
                          </div>
                        </div>
                        <div class="col-md-5">

                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="religion">Education Attainment</label>
                            <label class="radio-inline">
                              <input type="radio" name="education" value="0" checked> Post Graduate
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="education" value="1"> Graduate
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="education" value="2"> HighSchool
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="education" value="3"> Elementary
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="occupation">Occupation</label>
                              <label class="radio-inline">
                                <input type="radio" name="occupation" value="0" checked> Employed
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="occupation" value="1"> Self Employed
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="occupation" value="2"> Unemployed
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="occupation" value="3"> Business Owner
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="income">Income</label> <br/>
                                <div class="radio"><label>
                                  <input type="radio" name="income" value="0"> Above Minimum Wage
                                </label></div>
                                <div class="radio"><label>
                                  <input type="radio" name="income" value="1" checked> Minimum Wage
                                </label></div>
                                <div class="radio"><label class="radio">
                                  <input type="radio" name="income" value="2"> Below Minimum Wage
                                </label></div>
                                <strong class="float-left"><i>*Minimum Wage is Php 366.00 Daily</i></strong>
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="num_earners">Number of Household Earners</label>
                                <input type="number" class="form-control" id="num_earners" name="num_earners">
                                <label for="total_income_month">Total Household Income Per Month</label>
                                <input type="text" class="form-control" id="total_income_month" name="total_income_month">
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="med_insurance">Are you a member of any Health/Medical Insurance?</label>
                                <label class="radio-inline">
                                  <input type="radio" name="med_insurance" value="1"> Yes
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="med_insurance" value="0" checked> No
                                </label>
                              </div>
                            </div>
                          </div>

                          <hr/>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="nature_occupancy">Nature of Household Occupancy </label>
                                <label class="radio-inline">
                                  <input type="radio" name="nature_occupancy" value="0" checked> House and Lot Owner
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="nature_occupancy" value="1"> Renter
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="nature_occupancy" value="2"> Informal Settler
                                </label>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="is_voter">Are you a REGISTERED VOTER? </label>
                                <label class="radio-inline">
                                  <input type="radio" name="is_voter" value="1" checked> YES
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="is_voter" value="0"> NO
                                </label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="last_vote">If YES, when was the last time you voted?</label>
                                <input type="text" class="form-control" id="last_vote" name="last_vote">
                              </div>
                            </div>
                          </div>

                          <hr/>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="sector_president_id">SECTOR PRESIDENT</label>
                                <select id="sector_president_id" name="sector_president_id">
                                  <!-- TODO get sector presidents -->
                                  <option value=""></option>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12" style="text-align: right;">
                              <input class="btn btn-lg btn-primary" type="submit" value="Submit" />
                            </div>
                          </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<!-- Date Picker -->
<script type="text/javascript">
  $( function() {
    $( "#dob" ).datepicker({
      yearRange: "-120:+0",
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });
  } );
</script>
<!-- Email check -->
<script type="text/javascript">
  $(document).ready(function(){
    $("form").submit(function(event){
      var emailStr = $("input[name='email']").val();
      // Continue if empty for null email. Auto nu
      if( emailStr != "") {
        // Check if it's a valid email
        if (!isEmail(emailStr)) {
          event.preventDefault();
          alert("Invalid email.");
        }
      }
    });
  });

  function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }
</script>
@endsection
