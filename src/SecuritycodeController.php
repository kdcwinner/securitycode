<?php

namespace Kdcwinner\Securitycode;

use Illuminate\Http\Request;
use App\Models\User;
use Kdcwinner\Securitycode\Securitycode;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Response;

class SecuritycodeController extends Controller
{
    public function index() {
        $users = User::all();
        return view("securitycode::userlist",compact('users'));
    }

    public function assigncode(Request $request)
    {
            $uid = $request->input('uid');
            $user = User::find($uid);
            $obj_securitycod = new Securitycode();
            $code = $obj_securitycod->generateAndCheckConstraints();
            $user->securitycode = $code;
            $user->save();
            return response()->json(['success' => 200,'code'=>$code]);            
    }
}
