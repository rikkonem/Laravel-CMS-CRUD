<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $username = $this->ask("Username");
        $email = $this->ask("Email");
        $password = $this->secret("Password");

        if($this->validate($username, $email, $password))
        {
            User::create([
                'username' => $username,
                'email' => $email,
                'password' => Hash::make($password),
                'role' => 'admin'
            ]);

            $this->info("Admin created");
        }
    }

    private function validate($username, $email, $password)
    {
        $validator = Validator::make([
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ], [
            'username' => 'required|string|max:30|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            $this->info('Admin not created. See error messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 0;
        }
        return 1;
    }
}
