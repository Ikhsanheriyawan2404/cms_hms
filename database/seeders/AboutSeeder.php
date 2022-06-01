<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title =  'Company Profile';
        About::create([
            'title' => $title,
            'contents' => 'CV HARUMANIS  adalah perusahaan jasa angkutan barang  (expedisi)  yang telah berdiri sejak  20 Oktober 1984 di Kawali Ciamis, Kemudian dirubah menjadi PT HARUM MANIS LOGISTIK pada 05 Februari 2014 dan menunjuk  YUSUF ABDULAH NURDIN sebagai direktur utama nya PT HARUM MANIS LOGISTIK bertujuan membantu kelancaran usaha para pelaku bisnis baik perusahaan maupun perseorangan secara efektif dan efisien, dan juga memberikan pelayanan yang dapat meningkatkan "Supply Chain" dan memberikan keunggulan yang lebih kompetitif.',
            'slug' => Str::slug($title),
        ]);

        $title =  'Visi Misi';
        About::create([
            'title' => $title,
            'contents' => '
            Visi
            Menjadi Perusahaan jasa expedisi yang Handal, Profesional dan Terpercaya.
            Misi
            Menyediakan jasa expedisi yang dapat diandalkan
            Melaksanakan budaya kerja yang berlandaskan profesionalitas.
            Berperan Aktif dalam pendistribusian barang untuk wilayah di Pulau Jawa.
            MOTO PERUSAHAAN : Delivery On Time & Perfect Conditions, Definisi : Berkomitmen untuk memberikan Pelayanan sepenuh hati.
            ',
            'slug' => Str::slug($title),
        ]);
    }
}
