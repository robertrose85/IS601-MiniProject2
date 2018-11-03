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

    //Kept getting undefined variable when I tried to  pass this into a function. Please advise for knowledge.
    /**
    private $makeArray = array("Toyota", "Ford", "Honda"); //creates array
    private $makeKeys = array_rand($makeArray); // returns array KEY
    private $modelArray = array("Model1", "Model2", "Model3", "Model4");
    private $modelKeys = array_rand($modelArray);
    private $yearInt = mt_rand(2001,2019);
     * **/

    public function testCarInsert()
    {
        $makeArray = array("Toyota", "Ford", "Honda"); //creates array
        $makeKeys = array_rand($makeArray); // returns array KEY
        $modelArray = array("Model1", "Model2", "Model3", "Model4");
        $modelKeys = array_rand($modelArray);
        $yearInt = mt_rand(2001,2019);

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
        //echo $car;

        $car->Year = '2000';

        //echo $car;
        $car->save();

        $this->assertDatabaseHas('cars',[
            'Year' => '2000'
            ]
        );
    }
    public function testCarDelete()
    {
        $car = car::inRandomOrder()->first();

        //echo $car; // for testing purposes

        $car->delete();

        $this->assertDatabaseMissing('cars', [$car]);
    }
    public function testCarCount()
    {
        $count = car::all();

        $cars = $count->count();

        //echo "There are" . ' ' . $cars . ' ' . "cars in the database."; // testing purposes

        $this->assertTrue($cars >= 50);

    }

    public function testYearInt()
    {
        $car = car::inRandomOrder()->first();
        // this asserts that the car year is an integer - if true, test passes.
        $this->assertInternalType('int',$car->Year);
    }

    public function testMake()
    {
        $makeArray = array("Toyota", "Ford", "Honda"); //creates array

        $car = car::inRandomOrder()->first();
        // this asserts that the car year is an integer - if true, test passes.
        $this->assertTrue(in_array($car->Make,$makeArray));
    }
}
