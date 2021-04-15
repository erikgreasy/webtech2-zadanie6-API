<?php

namespace app\controllers;

use app\controllers\Controller;

class MemorabledayController extends Controller {

    public function index() {
        $memorabledays = $this->memorabledayRepository->all();

        return json_encode( $memorabledays );   

    }

 
}