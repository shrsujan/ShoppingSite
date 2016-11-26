@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">ShoppingSite Dashboard</div>

                <div class="panel-body">
                    Welcome {{ Auth::user()->name }}!
                </div>
                <div class="panel-body">
                    <a href="/dashboard"><button class="btn btn-sm btn-primary">Dashboard</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
