<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_items';
    protected $primaryKey = 'item_id';

    protected $fillable = [
        'item_name',
        'category',
        'description',
        'price',
        'availability',
    ];
}
