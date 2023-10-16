<?php
Route::get('calculator',function(){
    echo"Hello from calculator package";
});

// Route::get('add/{a}/{b}',[LP\Calculator\CrudController::class,'add']);
// Route::get('substract/{a}/{b}',[LP\Calculator\CrudController::class,'substract']);

// Route::get('index/',[LP\Calculator\CalculatorController::class,'index']);


Route::middleware(['web'])->group(function () {
         // Your routes here
     Route::resource('product',LP\Calculator\CrudController::class);
     });
