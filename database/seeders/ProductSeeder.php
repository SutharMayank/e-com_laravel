<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
            'name'=> 'Panasonic Tv',
            'price' => '15000',
            'catergory' => "Tv",
            'gallery' => "https://i.gadgets360cdn.com/products/televisions/large/1548154685_832_panasonic_32-inch-lcd-full-hd-tv-th-l32u20.jpg",
            'description' => "6gb Ram"
            ],

            [
            'name'=> 'samsung Mobile',
            'price' => '25000',
            'catergory' => "Tv",
            'gallery' => "https://4.imimg.com/data4/PM/KH/MY-34794816/lcd-500x500.png",
            'description' => "4gb Ram"
            ],

            [
                'name'=> 'samsung',
                'price' => '10000',
                'catergory' => "Fridge",
                'gallery' => "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTFx-2-wTOcfr5at01ojZWduXEm5cZ-sRYPJA&usqp=CAU",
                'description' => "Good Fridge"
            ],
        ]);
    }
}
