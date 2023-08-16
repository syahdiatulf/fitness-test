<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class FitnessClass extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'fitness_classes';

    // Define properties and relationships here
}
