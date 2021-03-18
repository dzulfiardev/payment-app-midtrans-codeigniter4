<?php

namespace App\Models;

use CodeIgniter\Model;

class CheckoutModel extends Model
{
    protected $table = ['order'];
    protected $primaryKey = ['order_id'];
}
