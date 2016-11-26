<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;

class RoleController extends AdminController
{
    protected $role;

    public function __construct(Request $request, RoleRepositoryInterface $role)
    {
        parent::__construct($request);
        $this->role = $role;
    }

    public function index()
    {
        try {
            return view('admin.role.view')->with(["roles" => $this->role->findAll()]);
        } catch (Exception $e) {
            abort(503);
        }
    }

    public function create()
    {
        try {
            return view('admin.role.create');
        } catch (Exception $e) {
            abort(503);
        }
    }
}
