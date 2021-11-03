<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class Film extends Model
{
    use HasFactory;

    /**
     * Filter query by given term
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchByTerm(Builder $query, $term)
    {
        return $query->where(function ($query) use($term) {
            $query->where('titre', 'like', '%' . $term . '%')
                ->orWhere('genre', 'like', '%' . $term . '%');
        });
    }

    /**
     * Get full url of film image
     * 
     * @return string
     */
    public function getImageUrl()
    {
        return static::generateImageUrl($this->image);
    }


    /**
     * generate full url for a given film image
     * 
     * @param string $image
     * @return string
     */
    public static function generateImageUrl($image)
    {
        return asset($image ?? 'placeholder.png');
    }
}
