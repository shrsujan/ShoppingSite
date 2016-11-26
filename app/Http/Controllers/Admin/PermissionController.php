<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Permission\PermissionRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;

class PermissionController extends AdminController
{
    protected $permission;

    public function __construct(Request $request, PermissionRepositoryInterface $permission)
    {
        parent::__construct($request);
        $this->permission = $permission;
    }

    public function index()
    {
        try {
            return view('admin.permission.view')->with(["permissions" => $this->permission->findAll()]);
        } catch (Exception $e) {
            abort(503);
        }
    }

    public function create()
    {
        try {
            return view('admin.permission.create');
        } catch (Exception $e) {
            abort(503);
        }
    }
}
