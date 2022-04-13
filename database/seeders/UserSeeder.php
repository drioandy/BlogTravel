<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function getUrlKeyByField($field)
    {
        $milliseconds = round(microtime(true) * 1000);
        $urlKey = $milliseconds . rand(0, 100) . "-" . str_slug($field, '-');
        return $urlKey;
    }
    public function run()
    {
        $users = [
            [
                'user_name' => 'admin0',
                'email' => 'admin0@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'admin1',
                'email' => 'admin1@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'admin3',
                'email' => 'admin3@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'admin4',
                'email' => 'admin4@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'admin5',
                'email' => 'admin5@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'admin6',
                'email' => 'admin6@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'user5',
                'email' => 'user5@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 2,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'user6',
                'email' => 'user6@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 2,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'user7',
                'email' => 'user7@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 2,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'user8',
                'email' => 'user8@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 2,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'user9',
                'email' => 'user9@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 2,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'user10',
                'email' => 'user10@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 2,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'user11',
                'email' => 'user11@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 2,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'user12',
                'email' => 'user12@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 2,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'user13',
                'email' => 'user13@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 2,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'user14',
                'email' => 'user14@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 2,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_name' => 'user15',
                'email' => 'user15@gmail.com',
                'password' => '$2y$10$.BGERx/9hPPnhyB8SR7vb..A5b/EsbUIW1Ei9f8CQDTZ2e5.Y3K2W',
                'url_key' => $this->getUrlKeyByField('admin'),
                'dob' => '1999-01-21',
                'avatar' => 'user-default.png',
                'gender' => 'male',
                'role_id' => 2,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }


    }
}
