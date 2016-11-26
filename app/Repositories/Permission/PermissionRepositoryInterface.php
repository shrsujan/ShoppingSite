<?php

namespace App\Repositories\Permission;

interface PermissionRepositoryInterface {

    public function findAll();

    public function store($data);

}