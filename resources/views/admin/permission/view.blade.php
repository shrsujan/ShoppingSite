@extends('layouts.dashboard')

@section('content')
    <section class="content">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Permissions</h3>
                @permission('create-permission')
                    <a href="/dashboard/permission/create" class="btn btn-xs btn-dropbox pull-right">
                        <i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add"></i>
                    </a>
                @endpermission
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Roles</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{!! $permission->id !!}</td>
                                <td>{!! $permission->display_name !!}</td>
                                <td>{!! $permission->description !!}</td>
                                <td>{!! $permission->roles()->count() !!}</td>
                                <td>
                                    @permission('edit-permission')
                                        <a href="/dashboard/permission/{!! $permission->id !!}/edit" class="btn btn-xs btn-primary">
                                            <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                        </a>
                                    @endpermission
                                    @permission('delete-permission')
                                        @if ($permission->name !== 'admin')
                                            <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">
                                                <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
                                                <form action="/admin/permission/{!! $permission->id !!}" method="POST" name="delete_item" style="display:none">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </form>
                                            </a>
                                        @endif
                                    @endpermission
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->
    </section>
@endsection