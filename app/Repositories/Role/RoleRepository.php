<?php

namespace App\Repositories\Role;

use Exception;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleRepository implements RoleRepositoryInterface
{
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function findAll()
    {
        try {
            return $this->role->all();
        } catch (Exception $e) {
            Log::error('RoleRepository|findAll()|Exception ==== ' . $e->getMessage());
            throw $e;
        }
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $this->role->fill([
                'name'          => $data['name'],
                'display_name'  => $data['display_name'],
                'description'   => $data['description']
            ])->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error('RoleRepository|store()|Exception ==== ' . $e->getMessage());
            throw $e;
        }
    }
}