<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AccountCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'account:create {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create account in application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');

        if ($email === null || $password === null) {
            $this->error("Bad arguments.");
            return 1;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $this->error("Invalid email format.");
            return 1;
        }

        $user = User::where('email', $email)->first();

        if (!is_null($user)) {
            $this->error("User with email '$email' already exists");
            return 1;
        }

        $hash = \Hash::make($password);

        $user = new User();
        $user->email = $email;
        $user->password = $hash;
        $user->name = explode('@', $email)[0];
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->save();

        $this->info("Successfully created user:");
        $this->info("Email: " . $email);
        $this->info("Name: " . $user->name);
        $this->info("Password: " . $password);
    }
}
