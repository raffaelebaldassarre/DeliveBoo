<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

  protected $fillable = ["special_requests", "name", "lastname", "address", "phone_number", "email", "restaurant_id", "exp_date" ];
  public function restaurant()
  {
      return $this->belongsTo(Restaurant::class);
  }

  public function dishes()
  {
    return $this->belongsToMany(Dish::class)->withPivot(['quantity']);
  }
}
