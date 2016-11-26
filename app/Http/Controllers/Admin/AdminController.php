<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function welcome()
    {
        return view('admin.welcome');
    }
}
