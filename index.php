<?php 

require_once 'inc/config.inc.php';

use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter as Router;

Router::setDefaultNamespace('app\controllers');



Router::start();
