<?php

use Illuminate\Database\Seeder;
use App\Color;
use App\Size;

class ColorSizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('colors')->truncate();
        DB::table('sizes')->truncate();     

        Color::insert([
            ['name' => null],
            ['name' => 'white'],
            ['name' => 'black'],
            ['name' => 'blue'],
            ['name' => 'green'],
            ['name' => 'yellow'],
            ['name' => 'red'],
            ]);

        Size::insert([
            ['name' => null],
            ['name' => 'small'],
            ['name' => 'medium'],
            ['name' => 'large'],            
            ]);       
        
        $this->command->info('Colors And Sizes seeded!');
    }
}
