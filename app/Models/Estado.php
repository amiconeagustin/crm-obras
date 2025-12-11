<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';      // o 'estados', según la migration
    protected $primaryKey = 'estadoId';

    public $timestamps = false;

    protected $guarded = [];
}
