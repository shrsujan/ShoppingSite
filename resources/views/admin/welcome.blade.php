@extends('layouts.dashboard')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Admin Panel
    <small>Welcome {{ Auth::user()->name }}</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-body">
	    <p>You can change the configuration of ShoppingSite from here.</p>
		<p>You can add/edit products from here.</p>
		<p>Start using it now!</p>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
@endsection