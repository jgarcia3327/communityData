@extends('layouts.app')

@section('html_title', " Add Sector President")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        		@if (!empty(session('success')))
        			<div class="alert alert-success" role="alert">{{{session('success')}}}</div>
        		@endif
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Add Sector President</h3></div>

              	<div class="panel-body">
              	
            			<form action="" method="POST">
            				{{ csrf_field() }}
                      	<div class="form-group">
                          <label for="sel1">Select list:</label>
                          <select class="form-control" id="sel1" name="user_id">
<!--                             <option></option> -->
                            @foreach(Common::getNotSectorPresidents() AS $v)
                          	<option value="{{$v->id}}">{{$v->lname}}, {{$v->fname}} {{$v->mname}}</option>
                          	@endforeach
                          </select>
            				</div>
                      
                      	<button type="submit" class="btn btn-primary">Add As Sector President</button>
                    </form>
            			
            			<hr/>
            			<h3>List of Sector Presidents</h3>
            
            			<ul class="list-group">
            				<?php 
            				$encoders = Common::getSectorPresidents();
            				?>
            				@if (count($encoders) <= 0) 
            					<li class="list-group-item"><i>No Sector President User Found.</i></li>
            				@else
        						@foreach($encoders AS $v)
        						<li class="list-group-item">
        						<span id="{{$v->id}}">{{strtoupper($v->lname)}}, {{strtoupper($v->fname)}} {{strtoupper($v->mname)}}</span>
        						<span class="badge pull-right"><a href="javascript:remove('{{$v->id}}', '{{strtoupper($v->lname)}}, {{strtoupper($v->fname)}} {{strtoupper($v->mname)}}')">Remove</a></span>
        						</li>
        						@endforeach
            				@endif
                     </ul>
                     <form action="{{ url('member/remove_sector_president') }}" method="POST" id="remove-encoder">
                     	{{ csrf_field() }}
                     	<input type="hidden" name="user_id" value="">
                     	<input type="hidden" name="complete_name" value="">
                     </form>
								
              	</div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
	function remove(id, name) {
		$("form#remove-encoder input[name='user_id']").val(id);
		$("form#remove-encoder input[name='complete_name']").val(name);
		$("form#remove-encoder").submit();
	}
</script>
@endsection
