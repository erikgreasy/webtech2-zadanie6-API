<?php

namespace app\controllers;

use app\controllers\Controller;

class CountryController extends Controller {

   public function index() {
       return json_encode( $this->countryRepository->all() );
   }
}