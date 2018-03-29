<?php

namespace Tests\Unit\Services\Installation;

use Tests\TestCase;
use \Illuminate\Foundation\Testing\DatabaseMigrations;

class AppInstallationServiceTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @return \Illuminate\Foundation\Application|mixed
     */
    protected function makeService()
    {
        return app(\App\Services\Installation\AppInstallationService::class);
    }

    /**
     * @test the Installation app
     */
    function testItInstallsTheApp()
    {
        $service = $this->makeService();
        $service->installApp([
            'name' => 'Patrick LUZOLO SIASIA',
            'username' => 'eldorplus',
            'email' => 'eldorplus@gmail.com',
            'password' => 'secret1983',
            'password_confirmation' => 'secret1983',
        ]);
        $this->assertDatabaseHas('users', [
            'name' => 'Patrick LUZOLO SIASIA',
            'email' => 'eldorplus@gmail.com',
        ]);
        $user = \App\Models\User::where('username', 'eldorplus')->first();

        $this->assertTrue($user->hasRole('Administrator'));
        $this->assertTrue($user->hasPermissionTo('Update roles'));
    }
}