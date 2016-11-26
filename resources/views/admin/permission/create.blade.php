@extends('layouts.dashboard')

@section('content')
    <section class="content">
        <form method="POST" action="/description/permission/save" accept-charset="UTF-8" class="form-horizontal" role="form" id="create-permission"><input name="_token" type="hidden" value="{{ csrf_token() }}">

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Permission</h3>
                </div><!-- /.box-header -->

                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input class="form-control" placeholder="Name" name="name" type="text" id="name">
                        </div>
                    </div><!--form control-->

                    <div class="form-group">
                        <label for="display_name" class="col-lg-2 control-label">Display Name</label>
                        <div class="col-lg-10">
                            <input class="form-control" placeholder="Display Name" name="display_name" type="text" id="display_name">
                        </div>
                    </div><!--form control-->

                    <div class="form-group">
                        <label for="description" class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" placeholder="Description" name="description" maxlength="255"></textarea>
                        </div>
                    </div><!--form control-->
                </div><!-- /.box-body -->
            </div><!--box-->

            <div class="box box-success">
                <div class="box-body">
                    <div class="pull-left">
                        <a href="/dashboard/permission" class="btn btn-danger btn-xs">Cancel</a>
                    </div>

                    <div class="pull-right">
                        <input type="submit" class="btn btn-success btn-xs" value="Create">
                    </div>
                    <div class="clearfix"></div>
                </div><!-- /.box-body -->
            </div><!--box-->

        </form>
    </section>
@endsection