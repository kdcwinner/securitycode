<?php
namespace Kdcwinner\Securitycode\Controllers;

use Illuminate\Http\Request;
use Kdcwinner\Securitycode\Securitycode;

class SecuritycodeController
{
    public function configration(Securitycode $Securitycode) {
         $Securitycode = $Securitycode->checkContraints();
        return view('securitycode::configration',compact('Securitycode'));
    }

    public function accessCode(Accesscode $accesscode) {
      $accesscode = $accesscode->generateSecuritycode();
        dd($accesscode);
      return response()->json(array('accesscode'=> $accesscode), 200);
   }
}
 