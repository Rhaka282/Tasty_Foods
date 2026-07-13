<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\News;
use App\Models\Gallery;
use App\Models\ContactMessage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Default Admin User
        User::factory()->create([
            'name' => 'Admin Tasty Food',
            'email' => 'admin@tastyfood.com',
            'password' => bcrypt('Admin00tasty'),
            'role' => 'admin',
        ]);

        // 2. Seed News Data
        $newsItems = [
            [
                'title' => 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.',
                'image' => 'ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg',
            ],
            [
                'title' => 'APA SAJA MAKANAN KHAS NUSANTARA?',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.',
                'image' => 'ASET/img-4.png',
            ],
            [
                'title' => 'MAKANAN SEHAT UNTUK DIET SEHARI-HARI',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo. Makanan sehat sangat penting untuk menjaga kesehatan tubuh kita.',
                'image' => 'ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg',
            ],
            [
                'title' => 'TIPS MEMASAK STEAK SUPAYA EMPUK DAN JUISI',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo. Teknik memasak daging sangat menentukan keempukan daging.',
                'image' => 'ASET/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg',
            ],
            [
                'title' => 'RESEP RAHASIA PASTA KHAS ITALIA YANG LEZAT',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo. Pasta lezat ditentukan oleh kematangan al dente.',
                'image' => 'ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg',
            ],
            [
                'title' => 'SARAPAN SEHAT DENGAN OATMEAL DAN BUAH SEGAR',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo. Oatmeal kaya serat sangat baik dikonsumsi di pagi hari.',
                'image' => 'ASET/brooke-lark-oaz0raysASk-unsplash.jpg',
            ],
            [
                'title' => 'MINUMAN HERBAL UNTUK MENJAGA IMUNITAS TUBUH',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo. Temulawak dan jahe dipercaya dapat meningkatkan imun tubuh.',
                'image' => 'ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg',
            ],
            [
                'title' => 'MAKANAN TRADISIONAL INDONESIA YANG MENDUNIA',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo. Rendang dan Nasi Goreng menjadi favorit wisatawan asing.',
                'image' => 'ASET/jonathan-borba-Gkc_xM3VY34-unsplash.jpg',
            ]
        ];

        foreach ($newsItems as $item) {
            News::create([
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'content' => $item['content'],
                'image' => $item['image'],
            ]);
        }

        // 3. Seed Gallery Data
        $galleryImages = [
            ['title' => 'Nasi Kuning Nusantara', 'image' => 'ASET/jonathan-borba-Gkc_xM3VY34-unsplash.jpg'],
            ['title' => 'Grain Salad Bowl', 'image' => 'ASET/anna-pelzer-IGfIGP5ONV0-unsplash.jpg'],
            ['title' => 'Roti Bakar Madu', 'image' => 'ASET/img-1.png'],
            ['title' => 'Avocado Toast', 'image' => 'ASET/brooke-lark-nBtmglfY0HU-unsplash.jpg'],
            ['title' => 'Sate Ayam Madura', 'image' => 'ASET/jonathan-borba-Gkc_xM3VY34-unsplash.jpg'],
            ['title' => 'Makanan Khas Sunda', 'image' => 'ASET/img-4.png'],
            ['title' => 'Mediterranean Spread', 'image' => 'ASET/ella-olsson-mmnKI8kMxpc-unsplash.jpg'],
            ['title' => 'Cooking Pasta Fresh', 'image' => 'ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg'],
            ['title' => 'Fruit Salad Oats', 'image' => 'ASET/brooke-lark-oaz0raysASk-unsplash.jpg'],
            ['title' => 'Steak Daging Sapi', 'image' => 'ASET/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg'],
            ['title' => 'Kari Ayam Pedas', 'image' => 'ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg'],
            ['title' => 'Dessert Manis Spesial', 'image' => 'ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg'],
        ];

        foreach ($galleryImages as $gal) {
            Gallery::create([
                'title' => $gal['title'],
                'image' => $gal['image'],
            ]);
        }

        // 4. Seed Contact Messages
        ContactMessage::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@gmail.com',
            'subject' => 'Tanya Menu Diet',
            'message' => 'Halo Tasty Food, apakah ada menu khusus untuk diet keto? Terima kasih.',
        ]);

        ContactMessage::create([
            'name' => 'Siti Aminah',
            'email' => 'siti@yahoo.com',
            'subject' => 'Reservasi Katering',
            'message' => 'Selamat siang, saya ingin memesan katering untuk acara keluarga minggu depan sebanyak 50 porsi.',
        ]);

        // 5. Seed Dynamic Settings
        $settings = [
            'about_title' => 'Tasty Food',
            'about_desc_1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.',
            'about_desc_2' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.',
            'visi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio. Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat. Duis nec ea at ante volutpat posuere. Morbi vel nunc tortor. Nulla facilisi. Nulla accumsan ullamcorper purus nec venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet erat vel leo rutrum lobortis.',
            'misi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio. Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat. Duis nec ea at ante volutpat posuere. Morbi vel nunc tortor. Nulla facilisi. Nulla accumsan ullamcorper purus nec venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet erat vel leo rutrum lobortis.',
            'contact_email' => 'tastyfood@gmail.com',
            'contact_phone' => '+62 812 3456 7890',
            'contact_address' => 'Kota Bandung, Jawa Barat',
            'contact_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.20140228813!2d107.5731165!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f9a0f47b330!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1718610000000!5m2!1sen!2sid',
            'contact_instagram' => 'https://instagram.com/tastyfood',
            'contact_facebook' => 'https://facebook.com/tastyfood',
            'contact_twitter' => 'https://twitter.com/tastyfood',
        ];

        foreach ($settings as $key => $value) {
            \Illuminate\Support\Facades\DB::table('settings')->updateOrInsert(
                ['key' => $key],
                ['value' => $value, 'created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
