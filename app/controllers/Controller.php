<?php

namespace app\controllers;

use database\repositories\DayRepository;
use database\repositories\CountryRepository;
use database\repositories\HolidayRepository;
use database\repositories\NamedayRepository;
use database\repositories\MemorabledayRepository;


class Controller {

    protected $namedayRepository;
    protected $dayRepository;
    protected $countryRepository;
    protected $holidayRepository;
    protected $memorabledayRepository;





    public function __construct() {
        $this->namedayRepository = new NamedayRepository();
        $this->dayRepository = new DayRepository();
        $this->countryRepository = new CountryRepository();
        $this->holidayRepository = new HolidayRepository();
        $this->memorabledayRepository = new MemorabledayRepository();


    }

}