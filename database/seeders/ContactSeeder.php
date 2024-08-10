<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'phone' => '+998(99) 111-11-11',
            'email' => 'test@gmail.com',
            'link' => 'https://youtube.com/',
            'image' => asset('images/address.png'),
        ]);
    }
}
