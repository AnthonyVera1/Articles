<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    //  On utilise pas les champs created_at et updated_at de laravel
    public $timestamps = false;

    /**
     * Articles associés à la catégorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'articles_categories', 'category_id', 'article_id');
    }
}
