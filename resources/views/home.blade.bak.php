@extends('layouts.app')

@section('html_title', "Dashboard")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Common::isAdmin())
                        <a href="{{ url('member/create') }}" class="btn btn-primary">Add Member</a>
                        <button class="btn btn-primary">Add Encoder</button>
                        <button class="btn btn-primary">Add Sector President</button>
                        <button class="btn btn-primary">Add Kaabag Admin</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
