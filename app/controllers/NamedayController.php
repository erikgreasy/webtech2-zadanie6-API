<?php

namespace app\controllers;

use app\models\Nameday;
use app\controllers\Controller;

class NamedayController extends Controller {

    public function index() {
        $namedays = $this->namedayRepository->all();

        return json_encode( $namedays );   

       
    }

    public function show( $country_name, $day_date ) {
        $country = $this->countryRepository->getByName($country_name);
        $day = $this->dayRepository->getByDate($day_date);

        if( ! $country || !$day ) {
            return response()->json([
                'message'   => 'Wrong parameters'
            ]);
        }

        $namedays = $this->namedayRepository->getByCountryAndDay($country, $day);
        
        return json_encode( $namedays );

    }


    public function store() {
        // For axios
        if(empty($_POST)) {
            $_POST = json_decode(file_get_contents("php://input"),true);
        }
        $errors = [];

        if( !isset($_POST['name']) || trim($name = $_POST['name']) == '' ) {
            $errors['name'] = 'Menno je povinné';
        }
        if( !isset($_POST['date']) || trim($date = $_POST['date']) == '' ) {
            $errors['date'] = 'Dátum je povinný';
        }
        // if( !isset($_POST['country']) || trim($country_id = $_POST['country']) == '' ) {
        //     $errors['country'] = 'Krajina je povinná';
        // }

        
        if( !empty($errors) ) {
            return response()->json($errors);
        }
        
        $country = $this->countryRepository->getByName('sk');
        $day = $this->dayRepository->getByDate($date);

        // if( !$country ) {
        //     $errors['country'] = 'Krajina neexistuje';
        // }

        if( !$day ) {
            $errors['date'] = 'Dátum neexistuje';
        }
        if( !empty($errors) ) {
            return response()->json($errors);
        }


        $nameday = new Nameday();
        $nameday->setName($name);
        $nameday->setCountry_id($country->getId());
        $nameday->setDay_id($day->getId());
        $nameday->setOriginal(0);
        $nameday = $this->namedayRepository->add( $nameday );

        return json_encode($nameday);
        

    }
}