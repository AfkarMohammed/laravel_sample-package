<?php
Route::get('calculator',function(){
    echo"Hello from calculator package";
});

Route::get('add/{a}/{b}',[LP\Calculator\CalculatorController::class,'add']);
Route::get('substract/{a}/{b}',[LP\Calculator\CalculatorController::class,'substract']);