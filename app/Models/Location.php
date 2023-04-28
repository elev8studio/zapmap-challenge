<?php

namespace App\Models;

use Akuechler\Geoly;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use Geoly;

    protected $guarded = ['id'];
}
