<?php

Route::get("ketan",function(){
echo "ketan is here!";
});
   /* Configration routes */
    Route::get('/securitycode/configration', 'Kdcwinner\Securitycode\ConfigrationController@index')->name('configration');
    Route::post('/saveconfigration', 'Kdcwinner\Securitycode\ConfigrationController@saveconfigration')->name('saveconfigration');

    /* Security code assigning routes */

    Route::get('/securitycode/userlist', 'Kdcwinner\Securitycode\SecuritycodeController@index')->name('userlist');

    Route::post('/assigncode', 'Kdcwinner\Securitycode\SecuritycodeController@assigncode')->name('assigncode');

?>