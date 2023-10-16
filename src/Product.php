<?php

namespace LP\Calculator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'detail', 'price', 'stock_quantity', 'photo'];
}
