<?php

namespace App\Repositories\Role;

interface RoleRepositoryInterface {

    public function findAll();

    public function store($data);

}