<?php

use Faker\Generator as Faker;
use App\car;


$factory->define(App\car::class, function (Faker $faker) {

    $makeArray = array("Toyota", "Ford", "Honda"); //creates array
    $makeKeys = array_rand($makeArray); // returns array KEY
    $modelArray = array("Model1", "Model2", "Model3", "Model4");
    $modelKeys = array_rand($modelArray);

    return [

        'Make' => $makeArray[$makeKeys], // inputs array key into array variable - resulting in random VALUE
        'Model' => $modelArray[$modelKeys],
        'Year' => rand(2000,2019),
    ];

});

