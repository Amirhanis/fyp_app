<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HashPlainPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hash:plain-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hash plain passwords stored in the users table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            if (!Hash::needsRehash($user->password)) {
                $user->password = Hash::make($user->password);
                $user->save();
            }
        }

        $this->info('Plain passwords hashed successfully.');
        return 0;
    }
}

