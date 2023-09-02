<?php

namespace Database\Seeders;

use App\Models\UserCredential;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the data for user credentials
        $credentialsData = [
            [
                'user_id' => 1,
                'username' => 'admin',
                'password' => bcrypt('adminpassword'),
            ],
            [
                'user_id' => 2,
                'username' => 'cashier',
                'password' => bcrypt('cashierpassword'),
            ],
            // Add more credential data as needed
        ];

        // Insert the data into the user_credentials table
        foreach ($credentialsData as $credentialData) {
            UserCredential::create($credentialData);
        }
    }
}
