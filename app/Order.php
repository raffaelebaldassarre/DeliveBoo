<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function restaurant()
  {
      return $this->belongsTo(Restaurant::class);
  }

  public function dishes()
  {
    return $this->belongsToMany(Dish::class);
  }
}
