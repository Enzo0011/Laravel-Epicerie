<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Discount;
use App\Models\FaqAnswer;
use App\Models\Product;
use App\Models\User;
use App\Models\Faq;
use App\Models\Order;
use App\Models\OrderItem;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Categorie::factory(10)->create();
        Discount::factory(10)->create();
        Product::factory(10)->create();
        Faq::factory(10)->create();
        FaqAnswer::factory(10)->create();
        Order::factory(10)->create();
        OrderItem::factory(10)->create();
    }
}
