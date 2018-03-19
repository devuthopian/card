<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Note;

use Auth;

class NotesController extends Controller
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

	### Display Notes
    public function index(Request $request){
    	$data['notes'] = Note::paginate(10);
    	return view('admin.notes.index', $data);
    }

    ### Add / Edit Note
    public function add(Request $request){
    	if($request->isMethod('post')){
    		$saveArr['description'] = $request->description;
    		$noteObj = new Note;
    		
    		if(!empty($request->id)){
    			$success_message = 'Note has been updated successfully.';
    			$noteObj->where('id', $request->id)->update($saveArr);
    		}else{
    			$success_message = 'Note has been saved successfully.';
    			$saveArr['admin_id'] = Auth::id();
    			$noteObj->create($saveArr);
    		}

    		return redirect('admin/notes')->with('success', $success_message);
    	}
    }

    ### Get Note
    public function get(Note $note){
    	### response
        return response()->json($note);
    }
}
