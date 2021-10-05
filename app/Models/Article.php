<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Article
 * @package App\Models
 */
class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'content', 'user_id'];

    /**
     * Relation avec la table users
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Pivot avec la table articles_categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'articles_categories', 'article_id', 'category_id');
    }

    /**
     * Modification de l'attribut title avant insertion en base de donnée
     *
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }

    /**
     * Modification de l'attribut slug avant insertion
     *
     * @param $value
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}
