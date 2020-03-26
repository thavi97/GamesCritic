<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
  //Table Name
  protected $table = 'test';

  protected $test = 'test';

  public $timestamps = false;
}
Test::all();
