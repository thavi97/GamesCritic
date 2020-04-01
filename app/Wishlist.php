<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
  //Table Name
  protected $table = 'wishlist';

  protected $fillable = [
      'user_id', 'item_id',
  ];

  public $timestamps = false;
}
Wishlist::all();
