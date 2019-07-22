<?php

//base dir for all files is 'files/'

Route::get('/{id}/{name}', 'redirect');	

Route::get('/a/b/c', 'test1');	

Route::get('/a', 'test2');
