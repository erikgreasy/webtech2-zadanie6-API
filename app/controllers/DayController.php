<?php

namespace app\controllers;

use app\controllers\Controller;

class DayController extends Controller {

   
    public function show( $country_name, $name ) {
        $country = $this->countryRepository->getByName($country_name);
        $nameday = $this->namedayRepository->getByNameAndCountry( urldecode($name), $country );

        if( ! $country ) {
            return response()->json([
                'message'   => 'Wrong parameters'
            ]);
        }
        
        if( !$nameday ) {
            return response()->json([]);
        }

        $day = $this->dayRepository->get($nameday->getDay_id());
        
        return json_encode( $day );

    }
}