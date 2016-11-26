<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->truncate();
        DB::table('roles')->truncate();
        DB::table('users')->truncate();

        /**
         * Create admin role
         */
        $role               = new Role();
        $role->name         = 'admin';
        $role->display_name = 'Administrator';
        $role->description  = 'Admin of the website and has all permissions';
        $role->created_at   = Carbon::now();
        $role->updated_at   = Carbon::now();
        $role->save();

        /**
         * Create admin user
         */
        $user               = new User();
        $user->name         = 'Sujan Shrestha';
        $user->email        = 'shrsujan2007@gmail.com';
        $user->password     = bcrypt('1234');
        $user->created_at   = Carbon::now();
        $user->updated_at   = Carbon::now();
        $user->save();

        $user = User::where('email', 'shrsujan2007@gmail.com')->first();
        $user->attachRole($role);
        $role = Role::where('name', 'admin')->first();

        /**
         * Permissions for roles
         */
        $permission               = new Permission();
        $permission->name         = 'view-roles';
        $permission->display_name = 'View Roles';
        $permission->description  = 'Permission that grants user to view roles';
        $permission->created_at   = Carbon::now();
        $permission->updated_at   = Carbon::now();
        $permission->save();
        $role->attachPermission($permission);

        $permission               = new Permission();
        $permission->name         = 'create-role';
        $permission->display_name = 'Create Role';
        $permission->description  = 'Permission that grants user to create role';
        $permission->created_at   = Carbon::now();
        $permission->updated_at   = Carbon::now();
        $permission->save();
        $role->attachPermission($permission);

        $permission               = new Permission();
        $permission->name         = 'edit-role';
        $permission->display_name = 'Edit Role';
        $permission->description  = 'Permission that grants user to edit role';
        $permission->created_at   = Carbon::now();
        $permission->updated_at   = Carbon::now();
        $permission->save();
        $role->attachPermission($permission);

        $permission               = new Permission();
        $permission->name         = 'delete-role';
        $permission->display_name = 'Delete Role';
        $permission->description  = 'Permission that grants user to delete role';
        $permission->created_at   = Carbon::now();
        $permission->updated_at   = Carbon::now();
        $permission->save();
        $role->attachPermission($permission);

        /**
         * Permissions for permission
         */
        $permission               = new Permission();
        $permission->name         = 'view-permissions';
        $permission->display_name = 'View Permissions';
        $permission->description  = 'Permission that grants user to view permissions';
        $permission->created_at   = Carbon::now();
        $permission->updated_at   = Carbon::now();
        $permission->save();
        $role->attachPermission($permission);

        $permission               = new Permission();
        $permission->name         = 'create-permission';
        $permission->display_name = 'Create Permission';
        $permission->description  = 'Permission that grants user to create permission';
        $permission->created_at   = Carbon::now();
        $permission->updated_at   = Carbon::now();
        $permission->save();
        $role->attachPermission($permission);

        $permission               = new Permission();
        $permission->name         = 'edit-permission';
        $permission->display_name = 'Edit Permission';
        $permission->description  = 'Permission that grants user to edit permission';
        $permission->created_at   = Carbon::now();
        $permission->updated_at   = Carbon::now();
        $permission->save();
        $role->attachPermission($permission);

        $permission               = new Permission();
        $permission->name         = 'delete-permission';
        $permission->display_name = 'Delete Permission';
        $permission->description  = 'Permission that grants user to delete permission';
        $permission->created_at   = Carbon::now();
        $permission->updated_at   = Carbon::now();
        $permission->save();
        $role->attachPermission($permission);
    }
}
