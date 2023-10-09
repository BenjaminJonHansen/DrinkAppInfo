<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Drink extends Model
{
    use HasFactory;

    public $guarded = [];

    public static function search($query)
    {
        return Http::get(
            'https://www.thecocktaildb.com/api/json/v1/1/search.php?s=' . $query)->json();
    }
}
