<?php

namespace Database\Seeders;

use App\Models\Stream;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
          "rentals",
          "employment",
          "capital gains",
          "royalty",
          "business",
          "investments",
        ];

        foreach ($items as $item) {
            if (!Stream::whereName($item)->count())
                Stream::UpdateOrCreate([
                    "name" => $item,
                    "note" => $item,
                ]);
        }
    }
}
