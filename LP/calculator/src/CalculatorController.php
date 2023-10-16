<?php

namespace  LP\Calculator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CalculatorController extends Controller
{
    public function add($a,$b){
    $result = " $a + $b";
        return view('calculator::add', compact('result'));
        
    }

    public function substract($a,$b){
        $result = $a - $b;

        return view('calculator::add', compact('result'));
    }
}
