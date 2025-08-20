<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '01711111111',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '01822222222',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rakib Hasan',
                'email' => 'rakib@example.com',
                'phone' => '01933333333',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
