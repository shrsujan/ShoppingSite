<?php

namespace App\Repositories\Permission;

use Exception;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PermissionRepository implements PermissionRepositoryInterface
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function findAll()
    {
        try {
            return $this->permission->all();
        } catch (Exception $e) {
            Log::error('PermissionRepository|findAll()|Exception ==== ' . $e->getMessage());
            throw $e;
        }
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $this->permission->fill([
                'name'          => $data['name'],
                'display_name'  => $data['display_name'],
                'description'   => $data['description']
            ])->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error('PermissionRepository|store()|Exception ==== ' . $e->getMessage());
            throw $e;
        }
    }
}