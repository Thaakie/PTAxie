<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Kategori Produk
        $categories = [
            ['name' => 'Mechanical Keyboard', 'slug' => 'mechanical-keyboard'],
            ['name' => 'Deskmat & Mousepad', 'slug' => 'deskmat-mousepad'],
            ['name' => 'Gaming Mouse', 'slug' => 'gaming-mouse'],
            ['name' => 'Desk Setup Accessories', 'slug' => 'desk-setup-accessories'],
        ];

        $catModels = [];
        foreach ($categories as $cat) {
            $catModels[$cat['slug']] = Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }

        // 2. Minimal 5 Produk Default
        $products = [
            [
                'category_id' => $catModels['mechanical-keyboard']->id,
                'name' => 'Axion Stealth Pro 75% Wireless Mechanical Keyboard',
                'slug' => 'axion-stealth-pro-75-wireless',
                'description' => 'Keyboard mekanikal 75% dengan gasket mount, knob volume CNC aluminium, switch factory-lubed linear Axion Cyan, triple-mode wireless (2.4GHz, Bluetooth 5.2, USB-C), serta hot-swappable 5-pin PCB.',
                'price' => 1250000,
                'warranty' => '2 Tahun Garansi Resmi',
                'stock' => 18,
                'image' => 'products/keyboard.jpg',
            ],
            [
                'category_id' => $catModels['deskmat-mousepad']->id,
                'name' => 'Axion CyberGrid Minimalist Topo Deskmat (900x400mm)',
                'slug' => 'axion-cybergrid-topo-deskmat',
                'description' => 'Deskmat ukuran jumbo 900x400x4mm berbahan micro-woven cloth dengan teknologi waterproof coating, stitched edge anti-fray, dan dasar karet non-slip natural rubber bertema cyberpunk topography.',
                'price' => 249000,
                'warranty' => '6 Bulan Garansi Jahitan',
                'stock' => 45,
                'image' => 'products/deskmat.jpg',
            ],
            [
                'category_id' => $catModels['gaming-mouse']->id,
                'name' => 'Axion HyperGlide Ultra-Lightweight Wireless Gaming Mouse',
                'slug' => 'axion-hyperglide-wireless-mouse',
                'description' => 'Mouse gaming ergonomis bobot 54 gram tanpa honeycomb holes, sensor optik PixArt PAW3395 hingga 26.000 DPI, polling rate 4000Hz compatible, dan baterai tahan hingga 80 jam bermain nonstop.',
                'price' => 789000,
                'warranty' => '1 Tahun Ganti Baru',
                'stock' => 24,
                'image' => 'products/mouse.jpg',
            ],
            [
                'category_id' => $catModels['desk-setup-accessories']->id,
                'name' => 'Axion AeroLift Premium Aluminium Monitor Arm Single',
                'slug' => 'axion-aerolift-monitor-arm',
                'description' => 'Gas-spring heavy duty monitor arm berbahan aerospace-grade aluminium alloy, mampu menopang monitor 17 hingga 35 inci (maks. 12kg) dengan manajemen kabel tersembunyi dan VESA 75/100.',
                'price' => 599000,
                'warranty' => '3 Tahun Garansi Mekanikal',
                'stock' => 12,
                'image' => 'products/monitor-arm.jpg',
            ],
            [
                'category_id' => $catModels['mechanical-keyboard']->id,
                'name' => 'Axion Nebula PBT Dye-Sub Keycaps Cherry Profile',
                'slug' => 'axion-nebula-pbt-keycaps',
                'description' => 'Set keycaps full size 138-keys bahan PBT tebal 1.5mm anti-shine dan anti-fade, profil Cherry ergonomis, kompatibel untuk layout 60%, 65%, 75%, TKL, hingga Fullsize ANSI.',
                'price' => 380000,
                'warranty' => '1 Tahun Garansi Resmi',
                'stock' => 30,
                'image' => 'products/keycaps.jpg',
            ],
            [
                'category_id' => $catModels['desk-setup-accessories']->id,
                'name' => 'Axion Lumina ScreenBar RGB Desk Lightbar Auto-Dimming',
                'slug' => 'axion-lumina-screenbar-rgb',
                'description' => 'Lampu gantung monitor pelindung mata dengan asimetris optical design anti-glare, ambient RGB backlight, touch control sensor, dan pengaturan temperatur warna 2700K - 6500K.',
                'price' => 420000,
                'warranty' => '1 Tahun Garansi Resmi',
                'stock' => 15,
                'image' => 'products/lightbar.jpg',
            ],
        ];

        foreach ($products as $p) {
            Product::firstOrCreate(['slug' => $p['slug']], $p);
        }
    }
}
