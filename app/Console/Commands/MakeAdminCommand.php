<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class MakeAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {user : 用户名} {--password= : 密码}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '新建一个账号';

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
        //
        $user = User::create([
            'username' => $this->argument('user'),
            'password' => bcrypt($this->option('password')),
            'email'    => 'test@test.com',
            'phone'    => '11111111111',
            'role'     => 'admin'
        ]);
        if($user)
            $this->info('successful！');
    }
}
