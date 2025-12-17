<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Category;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $pendidikan = Category::where('slug', 'donasi-pendidikan')->first();
        $kesehatan  = Category::where('slug', 'donasi-kesehatan')->first();

        Blog::create([
            'title' => 'Aksi Donasi Pendidikan di Desa Terpencil',
            'slug' => 'aksi-donasi-pendidikan',
            'content' => 'Ini adalah isi lengkap artikel donasi pendidikan. Cerita tentang kegiatan sosial dan bantuan pendidikan.',
            'category_id' => $pendidikan->id,
        ]);

        Blog::create([
            'title' => 'Bantuan Kesehatan untuk Masyarakat Kurang Mampu',
            'slug' => 'bantuan-kesehatan-masyarakat',
            'content' => 'Ini adalah isi lengkap artikel donasi kesehatan. Program pemeriksaan gratis dan bantuan medis.',
            'category_id' => $kesehatan->id,
        ]);
    }
}
