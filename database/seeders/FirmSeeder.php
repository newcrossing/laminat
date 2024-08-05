<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Firm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FirmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            [
                'name' => 'Alpine Floor',
                'values' => ['Albero', 'Aqua Life', 'Aqua Life XL', 'Aura', 'Herringbone',
                    'Herringbone 10', 'Herringbone 12', 'Herringbone 12 PRO', 'Intensity', 'Legno Extra', 'Milango', 'Premium', 'Ville'],
            ],


            ['name' => 'Skalla',
                'values' => ['Wood Chevron', 'Wood Herringbone'],
            ],
            [
                'name' => 'Egger',
                'values' => ['Egger PRO Laminate', 'Egger HOME Laminate', 'Egger AQUA+'],
            ],
            [
                'name' => 'Lamiwood',
                'values' => ['Bristol', 'Chester', 'Dinasty', 'Glanz', 'Relax Pro'],
            ],
        ];
        foreach ($attributes as $attribute) {
            DB::transaction(function () use ($attribute) {
                $createdAttribute = Firm::create([
                    'name' => $attribute['name'],
                    'slug' => Str::slug($attribute['name']),
                ]);

                foreach ($attribute['values'] as $value) {
                    $createdAttribute->collections()->create([
                        'name' => $value,
                        'slug' => Str::slug($value),
                    ]);
                }
            });
        }
    }
}
