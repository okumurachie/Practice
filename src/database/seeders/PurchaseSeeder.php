<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Product;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $users = User::all();
        $product = $products->find(1);
        $user = $users->where('id', '!=', $product->user_id)->random();


        Purchase::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'recipient' => 'test address',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $product->shipping_status = 1;
        $product->save();
    }
}
