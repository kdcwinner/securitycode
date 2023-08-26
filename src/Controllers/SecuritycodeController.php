<?php
namespace Kdcwinner\Securitycode\Controllers;

use Illuminate\Http\Request;
use Kdcwinner\Securitycode\Securitycode;

class SecuritycodeController
{
    public function configration(Securitycode $Securitycode) {
         $Securitycode = $Securitycode->generateSecuritycode();
        return view('accesscode::configration');
    }

    public function accessCode(Accesscode $accesscode) {
      $accesscode = $accesscode->generateAccessCode();
        dd($accesscode);
      return response()->json(array('accesscode'=> $accesscode), 200);
   }
}
 