<?php 

require_once 'inc/config.inc.php';

use Pecee\Http\Request;
use app\controllers\DayController;
use app\controllers\HolidayController;
use app\controllers\MemorabledayController;
use Pecee\SimpleRouter\SimpleRouter as Router;

Router::setDefaultNamespace('app\controllers');
// Router::get(ROUTING_PREFIX . '/loader', function() {
//     return require( 'loader.php' );
// });

Router::group(['prefix' => ROUTING_PREFIX . '/api', 'defaultParameterRegex' => '[\w\-\%]+'], function () {
    
    Router::get('/namedays/{country}/{date}', 'NamedayController@show');
    Router::post( '/namedays', 'NamedayController@store' );

    Router::get('/days/{country}/{name}', 'DayController@show');

    Router::get('/holidays/{country}', 'HolidayController@index');

    Router::get('/memorabledays', 'MemorabledayController@index');
    Router::get('/countries', 'CountryController@index');


    Router::error(function(Request $request, \Exception $exception) {
        return response()->json([
            'message' => "Route not found"
        ]);
        
    });
});

Router::get(ROUTING_PREFIX . '/', function() {
    return view('home');
});

Router::error(function(Request $request, \Exception $exception) {
    return view('home');

    return response()->json([
        'message' => "Route not found"
    ]);
    
});

Router::start();
