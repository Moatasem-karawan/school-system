<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Specialty extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guarded=[];
    protected $table="specialtys";
    public $translatable = ["title"];
}
