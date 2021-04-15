<?php

namespace app\controllers;

use app\controllers\Controller;

class HolidayController extends Controller {

    public function index( $country_name ) {
        $country = $this->countryRepository->getByName( $country_name );
        
        if( !$country ) {
            return response()->json([
                'message'   => 'Wrong parameters'
            ]);
        }
        
        $holidays = $this->holidayRepository->getByCountry( $country );

        foreach($holidays as $holiday) {
            $holiday->days = 'abc';
        }

        return json_encode( $holidays );   

   
    }

}