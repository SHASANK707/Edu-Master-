
<?php

use Illuminate\Support\Facades\Route;

Route::get('/get-data', function () {
    return response()->json(['message' => 'Hello']);
});

Route::get('/get-data',function(){
    echo "Hello";

});
