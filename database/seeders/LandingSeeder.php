<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'landing_slider_product_1_title', 
                "lorem", 
                "string",
            ],
            [
                'landing_slider_product_1_warding_text', 
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, non? Sunt est laboriosam consequuntur, incidunt, nulla error quisquam nisi totam veritatis, ipsum vitae iusto officiis at? Dolor sunt sint eos.", 
                "string",
            ],
            [
                'landing_slider_product_1_image', 
                null, 
                "image",
            ],
            [
                'landing_slider_product_2_title', 
                "lorem", 
                "string",
            ],
            [
                'landing_slider_product_2_warding_text', 
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, non? Sunt est laboriosam consequuntur, incidunt, nulla error quisquam nisi totam veritatis, ipsum vitae iusto officiis at? Dolor sunt sint eos.", 
                "string",
            ],
            [
                'landing_slider_product_2_image', 
                null, 
                "image",
            ],
            [
                'landing_slider_product_3_title', 
                "lorem", 
                "string",
            ],
            [
                'landing_slider_product_3_warding_text', 
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, non? Sunt est laboriosam consequuntur, incidunt, nulla error quisquam nisi totam veritatis, ipsum vitae iusto officiis at? Dolor sunt sint eos.", 
                "string",
            ],
            [
                'landing_slider_product_3_image', 
                null, 
                "image",
            ],
            [
                'landing_about_us_warding_text', 
                "NRW Architect, biro arsitektur yang berbasis di Yogyakarta. Kami siap menjadi rekan terbaik Anda dalam desain arsitektur dan konstruksi khususnya untuk bangunan rumah tinggal, interior, rumah menengah hingga menengah atas. Bersama NRW Architect 'Your Stunning Architect', mari kita wujudkan karya terbaik bagi semua.",
                "string",
            ],
            [
                'landing_about_us_image',
                null,
                "image",
            ],
            [
                'landing_about_us_point_1',
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, non? Sunt est laboriosam consequuntur, incidunt, nulla error quisquam nisi totam veritatis, ipsum vitae iusto officiis at? Dolor sunt sint eos.",
                "string",
            ],
            [
                'landing_about_us_point_2',
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, non? Sunt est laboriosam consequuntur, incidunt, nulla error quisquam nisi totam veritatis, ipsum vitae iusto officiis at? Dolor sunt sint eos.",
                "string",
            ],
            [
                'landing_contact_map',
                "Kronggahan, Trihanggo, Gamping Sleman",
                "string",
            ],
            [
                'landing_contact_phone',
                "0877216537065",
                "string",
            ],
            [
                'landing_contact_email',
                "pedabayu@gmail.com",
                "string",
            ],
            [
                'landing_social_media_instagram',
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, non? Sunt est laboriosam consequuntur, incidunt, nulla error quisquam nisi totam veritatis, ipsum vitae iusto officiis at? Dolor sunt sint eos.",
                "string",
            ],
            [
                'landing_social_media_facebook',
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, non? Sunt est laboriosam consequuntur, incidunt, nulla error quisquam nisi totam veritatis, ipsum vitae iusto officiis at? Dolor sunt sint eos.",
                "string",
            ],
            [
                'landing_social_media_twitter',
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, non? Sunt est laboriosam consequuntur, incidunt, nulla error quisquam nisi totam veritatis, ipsum vitae iusto officiis at? Dolor sunt sint eos.",
                "string",
            ],
            [
                'landing_logo',
                null,
                "image",
            ],
        ];
        
        foreach ($data as $key => $value) {
            DB::insert('insert into landings (meta_key, meta_value, meta_type) values (?, ?, ?)', $value);
        }
    }
}
