<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\car;

class CarTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testCarInsert()
    {
        $makeArray = array("Toyota", "Ford", "Honda"); //creates array
        $makeKeys = array_rand($makeArray); // returns array KEY
        $modelArray = array("Model1", "Model2", "Model3", "Model4");
        $modelKeys = array_rand($modelArray);
        $yearInt = rand(2001,2019);

        $user = factory(\App\car::class)->create([
            'Make' => $makeArray[$makeKeys],
            'Model' => $modelArray[$modelKeys],
            'Year' => $yearInt
            ]);

        $this->assertDatabaseHas('cars',
        [
            'Make'=>$makeArray[$makeKeys],
            'Model' => $modelArray[$modelKeys],
            'Year' => $yearInt
        ]);

    }
    public function testYearChange()
    {

        $car = car::inRandomOrder()->first(); //car::where('Year' <> '2000')->first();
        echo $car;

        $car->Year = '2000';

        echo $car;
        $car->save();

        $this->assertDatabaseHas('cars',[
            'Year' => '2000'
            ]
        );
    }
}
