<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $fillable = ["name", "address", "phone_number", "slug", "image", "user_id"];

    public function getRouteKeyName ()
    {
        return 'slug';
    }

    /**
     * Get the user that owns the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The roles that belong to the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, "category_restaurant", "restaurant_id", "category_id");
    }

    /**
     * Get all of the comments for the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function scopeWithFilters($query)
    {
        return $query->when(count(request()->input('categories', [])), function ($query){
            $query->whereIn('category_id', request()->input('category_restaurant', []));
        });

            

            /* $restaurants = Restaurant::whereHas('categories', function($query) use($category_id) {
                $query->whereIn('id', $category_id);
            })->get(); */
    }
}
