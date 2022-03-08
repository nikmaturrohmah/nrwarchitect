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
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, non? Sunt est laboriosam consequuntur, incidunt, nulla error quisquam nisi totam veritatis, ipsum vitae iusto officiis at? Dolor sunt sint eos.", 
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
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, non? Sunt est laboriosam consequuntur, incidunt, nulla error quisquam nisi totam veritatis, ipsum vitae iusto officiis at? Dolor sunt sint eos.",
                "string",
            ],
            [
                'landing_contact_phone',
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, non? Sunt est laboriosam consequuntur, incidunt, nulla error quisquam nisi totam veritatis, ipsum vitae iusto officiis at? Dolor sunt sint eos.",
                "string",
            ],
            [
                'landing_contact_email',
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, non? Sunt est laboriosam consequuntur, incidunt, nulla error quisquam nisi totam veritatis, ipsum vitae iusto officiis at? Dolor sunt sint eos.",
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
        ];
        
        foreach ($data as $key => $value) {
            DB::insert('insert into landings (meta_key, meta_value, meta_type) values (?, ?, ?)', $value);
        }
    }
}
