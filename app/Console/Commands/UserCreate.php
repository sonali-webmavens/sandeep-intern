<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Str;


class UserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'User:create {--verified=}{--email=}{--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->option('email') ?? Str::random(8);
        $password =$this->option('password') ?? "sandip";
        $user=  User::create([
            "name" =>$name,
            "email" => $name."@gmail.com",
            "password" => $password ,
            "email_verified_at" => $this->option("verified") ? now() :null,
        ]);
        $this->info("Success"."  email is ".$user->email."  and password is ".$password);
    }
}
