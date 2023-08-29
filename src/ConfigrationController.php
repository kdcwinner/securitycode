<?php

namespace Kdcwinner\Securitycode;

use Kdcwinner\Securitycode\Models\Configration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigrationController extends Controller
{
    public function index() {
        $configration = Configration::get()->first();
        $data = json_decode($configration->data);
        return view("securitycode::configration",compact('data'));
    }

    public function saveconfigration(Request $request)
    {
            $code_length = $request->input('code_length');
            $data = json_encode(['code_length'=>$code_length]);
            Configration::whereNotNull('id')->delete();  
            $configration = new Configration();
            $configration->data = $data;
            $configration->save();
            return redirect()->route('configration')->with('success','Configration saved Successfully!');
    }
}
