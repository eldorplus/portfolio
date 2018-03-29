<?php
namespace Tests\Unit\Services\Installation;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
class InstallAppHandlerTest extends TestCase
{
    use DatabaseMigrations;

    function makeHandler()
    {
        return  app(\App\Services\Installation\InstallAppHandler::class);
    }

    function testItCreatesRoles()
    {
        $handler = $this->makeHandler();
        $handler->createRoles();
        $this->assertDatabaseHas('roles', [
            'name' => 'Administrator'
        ]);
    }

    function testItCreatesPermissions()
    {
        $handler = $this->makeHandler();
        $handler->createPermissions();
        $this->assertDatabaseHas('permissions', [
            'name' => 'List users'
        ]);
        $this->assertDatabaseHas('permissions', [
            'name' => 'Delete users'
        ]);
        $this->assertDatabaseHas('permissions', [
            'name' => 'Update roles'
        ]);
        $this->assertDatabaseHas('permissions', [
            'name' => 'List permissions'
        ]);
        $this->assertDatabaseHas('permissions', [
            'name' => 'Associate users with roles'
        ]);
    }


    function testItCreatesAdminUser()
    {
        $handler = $this->makeHandler();
        $handler->createAdminUser([
            'name' => 'Patrick LUZOLO SIASIA',
            'email' => 'eldorplus@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);
        $this->assertDatabaseHas('users', [
            'name' => 'Patrick LUZOLO SIASIA',
            'email' => 'eldorplus@gmail.com',
        ]);
        $user = \App\Models\User::where('email', 'eldorplus@gmail.com')->first();
        $this->assertNotNull($user->uuid);
    }

    function testItAssignsAdminRoleToAdminUser()
    {
        $handler = $this->makeHandler();
        $result = $handler->createRoles()->createPermissions()->createAdminUser([
            'name' => 'Patrick LUZOLO SIASIA',
            'email' => 'eldorplus@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ])->assignAdminRoleToAdminUser();
        $this->assertTrue($result->adminUser->hasRole('Administrator'));
    }


    function testItAssignsAllPermissionsToAdminRole()
    {
        $handler = $this->makeHandler();
        $result = $handler->createRoles()->createPermissions()->assignAllPermissionsToAdminRole();
        $role = $result->roles->first();
        $this->assertTrue($role->hasPermissionTo('List users'));
        $this->assertTrue($role->hasPermissionTo('Delete users'));
        $this->assertTrue($role->hasPermissionTo('List permissions'));
        $this->assertTrue($role->hasPermissionTo('Associate users with roles'));
        $this->assertTrue($role->hasPermissionTo('Associate roles with permissions'));
    }
}