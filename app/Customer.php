<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
  protected $guard = 'customer';
  protected $table = 'customers';
  // public $timestamps = false;
  use Notifiable;

  protected $fillable = [
      'name', 'email', 'password'
  ];
}
