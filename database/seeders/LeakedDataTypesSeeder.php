<?php

namespace Database\Seeders;

use App\Models\LeakedDataType;
use Illuminate\Database\Seeder;

class LeakedDataTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultDataTypes = [
            ['type' => 'Emails', 'description' => 'Email Accounts'],
            ['type' => 'Usernames', 'description' => 'Usernames'],
            ['type' => 'Passwords', 'description' => 'Passwords'],
            ['type' => 'PW-hash', 'description' => 'Password Hash'],
            ['type' => 'IP-add', 'description' => 'IP Address'],
            ['type' => 'Phones', 'description' => 'Phone Numbers'],
            ['type' => 'SSN', 'description' => 'SSN Data'],
            ['type' => 'Banking', 'description' => 'Bank Accounts Data'],
            ['type' => 'Bitcoin', 'description' => 'Crypto Data']
        ];
        foreach ($defaultDataTypes as $dataType) {
            LeakedDataType::updateOrCreate([
                'type' => $dataType['type']
            ], [
                'description' => $dataType['description']
            ]);
        }
    }
}
