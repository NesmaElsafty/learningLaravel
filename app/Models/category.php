<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class category extends Model
{
    use HasFactory;
    use HasTranslations;

    // protected $fillable = [
    //   'title'
    // ];

    protected $guarded = ['id'];

    public $translatable = ['title'];

    protected $table = 'categories';
    protected $primaryKey = 'id';

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
