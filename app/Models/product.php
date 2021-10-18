<?php
namespace App\Models;
use App\Scopes\scopes;

use App\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class product extends Model
{ 
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name', 'description'];


    protected $guarded = ['id'];

    protected $table = 'products';
    protected $primaryKey = 'id';

    //   protected static function booted()
    // {

    //     static::addGlobalScope('ancient', function (Builder $builder) {
    //         $builder->where('active', 1);
    //     });
    // }

    // public function scopeActive($query)
    // {
    //     return $query->where('active', 1);
    // }

    // public function scopeActive($query)
    //     {
    //         return $query->where('active', 1);
    //     }

    // $product = Product::where('active', 1)->get();

    // $products = DB::table('products')->where('active', 1)->get();
    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function taxes()
    {
        return $this->belongsToMany(taxes::class, 'product_tax');
    }
}
