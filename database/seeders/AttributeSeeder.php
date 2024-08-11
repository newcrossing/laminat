<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            [
                'name' => 'Color',
                'values' => ['Red', 'Blue', 'Green', 'Black', 'White', 'Yellow'],
            ],
            [
                'name' => 'RAM',
                'values' => ['2GB', '4GB', '8GB', '16GB'],
            ],
            [
                'name' => 'Storage',
                'values' => ['32GB', '64GB', '128GB', '256GB', '512GB', '1TB'],
            ],
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('attributes')->truncate();
        DB::table('attribute_options')->truncate();
        foreach ($attributes as $attribute) {
            DB::transaction(function () use ($attribute) {
                $createdAttribute = Attribute::create([
                    'name' => $attribute['name'],
                  'slug' => Str::slug($attribute['name']),
                ]);
                foreach ($attribute['values'] as $value) {
                    $createdAttribute->attributeOptions()->create(['value' => $value]);
                }
            });
        }
    }
}
