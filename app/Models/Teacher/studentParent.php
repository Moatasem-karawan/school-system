<?php

namespace App\Models\Teacher;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class studentParent extends Model
{

    use HasFactory;
    protected $table="studentparents";
//    public $translatable = ['name_section'];
protected $guarded=[];
    public function my_area(){
        return $this->belongsTo("App\Models\Teacher\Area","area_father_id");
    }
    public function files(){
        return $this->morphMany(File::class,"fileable");
    }
}
