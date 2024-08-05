<?php

namespace Database\Seeders;

use App\Models\Firm;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            'Ламинат',
            'Паркетная доска',
            'Инженерная доска',
            'Массивная доска',
            'Штучный паркет',
            'Модульный паркет',
            'Виниловый пол',
            'Терасная доска',
        ];
        foreach ($attributes as $attribute) {
            DB::transaction(function () use ($attribute) {
                Type::create([
                    'name' => $attribute,
                    'slug' => Str::slug($attribute),
                ]);
            });
        }
    }
}
