<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // reset cached roles and permissions
          app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

          $accessUser = 'access-user';
          $storeUser = 'store-user';
          $editUser = 'edit-user';
          $deleteUser = 'delete-user';
          $countUser = 'count-user';
 
          $accessRegister = 'access-register';
          $accessLogin = 'access-login';
          $accessLogout = 'access-logout';
 
          $forgotPassword = 'forgot-password';
          $resetPassword = 'reset-password';
 
          $profileUpdate = 'profile-update';
  
          $accessSkill = 'access-skill';
          $storeSkill = 'store-skill';
          $updateSkill = 'update-skill';
          $deleteSkill = 'delete-skill';

          $accessProject = 'access-project';
          $storeProject = 'store-project';
          $showProject = 'show-project';
          $updateProject = 'edit-project';
          $deleteProject = 'delete-project';
  
          $accessContact = 'access-contact';
          $saveContact = 'save-contact';
          $deleteContact = 'delete-contact';

          $allProject = 'all-project';
          $getProjectById = 'single-project';
          $getProjectBySkill = 'project-by-skill';
 
          $accessSetting = 'access-settings';
          $deleteSetting = 'delete-settings';
 
 
            //create permisssion for post cms//
 
            Permission::create(['name' => $accessUser]);
            Permission::create(['name' => $storeUser]);
            Permission::create(['name' => $editUser]);
            Permission::create(['name' => $deleteUser]);
            Permission::create(['name' => $countUser]);
 
            Permission::create(['name' => $accessRegister]);
            Permission::create(['name' => $accessLogin]);
            Permission::create(['name' => $accessLogout]);
 
            Permission::create(['name' => $forgotPassword]);
            Permission::create(['name' => $resetPassword]);
 
            Permission::create(['name' => $profileUpdate]);
    
            Permission::create(['name' => $accessSkill]);
            Permission::create(['name' => $storeSkill]);
            Permission::create(['name' => $updateSkill]);
            Permission::create(['name' => $deleteSkill]);
    
            Permission::create(['name' => $accessProject]);
            Permission::create(['name' => $storeProject]);
            Permission::create(['name' => $showProject]);
            Permission::create(['name' => $updateProject]);
            Permission::create(['name' => $deleteProject]);
 
            Permission::create(['name' => $accessContact]);
            Permission::create(['name' => $saveContact]);
            Permission::create(['name' => $deleteContact]);

            Permission::create(['name' => $allProject]);
            Permission::create(['name' => $getProjectById]);
            Permission::create(['name' => $getProjectBySkill]);

 
            Permission::create(['name' => $accessSetting]);
            Permission::create(['name' => $deleteSetting]);
 
 
             //...Roles...//
    
             $admin = 'admin';
             $user = 'user';
 
 
             $role = Role::create(['name' => $admin])->givePermissionTo(Permission::all());
 
 
             $role = Role::create(['name' => $user])->givePermissionTo([
           
                 $allProject,
                 $getProjectById,
                 $getProjectBySkill,
             ]);
    
    }
}
