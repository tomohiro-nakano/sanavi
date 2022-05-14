<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PlacePost extends Model
{
    use HasFactory;
    use Sortable;
    public $sortable = ['id', 'place_name', 'room_temp', 'water_temp', 'price'];

}
