<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserType::create([
            'id' => UserType::USER_TYPE_ADMIN,
            'user_type' => 'Admin',
        ]);

        UserType::create([
            'id' => UserType::USER_TYPE_CASHIER,
            'user_type' => 'Cashier',
        ]);
    }
}
