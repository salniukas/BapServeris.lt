<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = [
        'username', 'email', 'amount', 'type', 'service_name', 'gift', 'giftedby'];

}
