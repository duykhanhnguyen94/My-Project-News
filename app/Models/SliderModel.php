<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
    protected $table = 'slider';
    protected $primary = 'id';
    public $timestamps = false;
    const CREATED_AT = 'cteated';
    const UPDATED_AT = 'modified';




    
}
