<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use App\Models\Role; 

class MakeFirstUserAdmin extends Command
{
    protected $signature = 'admin:make-first-user-admin';
    protected $description = 'Assign admin role to the first user';

    public function handle()
    {
        $user = User::first();
        $adminRole = Role::where('name', 'admin')->first();

        if ($user && $adminRole) {
            $user->role()->associate($adminRole);
            $user->save();

            $this->info('Admin role assigned to the first user successfully.');
        } else {
            $this->error('User or admin role not found.');
        }
    }
}
