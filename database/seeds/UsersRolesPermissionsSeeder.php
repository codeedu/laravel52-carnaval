<?php

use Illuminate\Database\Seeder;

class UsersRolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(\CodePub\Models\User::class)->create([
            'name' => 'Admin da Silva',
            'email' => 'admin@admin.com',
            'password' => bcrypt(123456)
        ]);

        $roleAdmin = factory(\CodePub\Models\Role::class)->create([
            'name' => 'Admin',
            'description' => 'System Administrator'
        ]);

        $user->addRole($roleAdmin);

        $userManager = factory(\CodePub\Models\User::class)->create([
            'name' => 'Manager da Silva',
            'email' => 'manager@admin.com',
            'password' => bcrypt(123456)
        ]);

        $roleManager = factory(\CodePub\Models\Role::class)->create([
            'name' => 'Manager',
            'description' => 'System Manager'
        ]);

        $userManager->addRole($roleManager);

        $userSupervisor = factory(\CodePub\Models\User::class)->create([
            'name' => 'Supervisor da Silva',
            'email' => 'supervisor@admin.com',
            'password' => bcrypt(123456)
        ]);

        $roleSupervisor = factory(\CodePub\Models\Role::class)->create([
            'name' => 'Supervisor',
            'description' => 'System Supervisor'
        ]);

        $userSupervisor->addRole($roleSupervisor);


        $userList = factory(\CodePub\Models\Permission::class)->create([
            'name'=>'user_list',
            'description' => 'Can list all users'
        ]);

        $userAdd = factory(\CodePub\Models\Permission::class)->create([
            'name'=>'user_add',
            'description' => 'Can add users'
        ]);

        $userEdit = factory(\CodePub\Models\Permission::class)->create([
            'name'=>'user_edit',
            'description' => 'Can edit users'
        ]);

        $userDestroy = factory(\CodePub\Models\Permission::class)->create([
            'name'=>'user_destroy',
            'description' => 'Can destroy an user'
        ]);

        $userViewRoles = factory(\CodePub\Models\Permission::class)->create([
            'name'=>'user_view_roles',
            'description' => 'Can view the users roles'
        ]);

        $userAddRole = factory(\CodePub\Models\Permission::class)->create([
            'name'=>'user_add_role',
            'description' => 'Can add a new role for an user'
        ]);

        $userRevokeRole = factory(\CodePub\Models\Permission::class)->create([
            'name'=>'user_revoke_role',
            'description' => 'Can revoke a role for an user'
        ]);

        $managePermissions = factory(\CodePub\Models\Permission::class)->create([
            'name'=>'permission_admin',
            'description' => 'Can admin all permissions'
        ]);

        $AdminRoles = factory(\CodePub\Models\Permission::class)->create([
            'name'=>'role_admin',
            'description' => 'Can admin all roles'
        ]);

        $roleManager->addPermission($userList);
        $roleManager->addPermission($userEdit);
        $roleManager->addPermission($userAdd);
        $roleManager->addPermission($userViewRoles);

        $roleSupervisor->addPermission($userList);
        $roleSupervisor->addPermission($userViewRoles);
    }
}
