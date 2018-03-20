<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ConnectionSetting;

class ConnectionsController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request){
        $data['connectionSettingsResultObj'] = ConnectionSetting::get();
    	return view('admin.connections.index', $data);
    }


    public function update(Request $request){
        $requestArr = $request->all();
        foreach ($requestArr['connectionSetting'] as $key => $value) {
            ConnectionSetting::where('id', $key)->update(['setting_value'=>$value]);
        }
        
        return redirect('admin/connections')->with('success','Connection settings updated successfully.');
    }
}
