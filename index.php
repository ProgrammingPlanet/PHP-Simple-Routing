<?php

require_once "Boot.php";

require_once "routes.php";

Route::dispatch($_SERVER['REQUEST_URI']);