@extends('layouts.dashboard')

@section('content')
    <section class="content">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Roles</h3>
                @permission('create-role')
                    <a href="/dashboard/role/create" class="btn btn-xs btn-dropbox pull-right">
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
                            <th>Permissions</th>
                            <th>Users</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{!! $role->id !!}</td>
                                <td>{!! $role->display_name !!}</td>
                                <td>{!! $role->description !!}</td>
                                <td>
                                    @if ($role->name === 'admin')
                                        <span class="label label-success">all</span>
                                    @else
                                        @if ($role->perms->count() > 0)
                                            <div style="font-size:.7em">
                                                @foreach ($role->perms() as $perm)
                                                    {!! $perm->display_name !!}<br/>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="label label-danger">None</span>
                                        @endif
                                    @endif
                                </td>
                                <td>{!! $role->users()->count() !!}</td>
                                <td>
                                    <a href="/dashboard/role/{!! $role->id !!}/edit" class="btn btn-xs btn-primary">
                                        <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                    </a>
                                    @if ($role->name !== 'admin')
                                        <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();">
                                            <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
                                            <form action="/admin/role/{!! $role->id !!}" method="POST" name="delete_item" style="display:none">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                        </a>
                                    @endif
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