<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Taxes extends Model
{
    use HasTranslations;
    use HasFactory;
    
    public $translatable = ['name'];


    protected $guarded = ['id'];

    protected $table = 'taxes';
    protected $primaryKey = 'id';

    public function product()
    {
        return $this->belongsToMany(product::class, 'product_tax');
    }

}
