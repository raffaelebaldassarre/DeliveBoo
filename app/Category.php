<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The roles that belong to the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
