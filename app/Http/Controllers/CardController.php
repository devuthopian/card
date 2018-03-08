<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Card;
use Auth;
use App\User;
use DB;

class CardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $Cards = Card::where('created_by',$user->id)->get();
        return view('home', compact('Cards'));
    }

    public function viewdirectory()
    {
        $Cards = DB::table('card')
            ->join('users', 'users.id', '=', 'card.created_by')
            ->select('users.name', 'card.card_name', 'card.description','card.image', 'card.id')
            ->where('card.deleted_at', null)
            ->get();

        return view('directory', compact('Cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'txtName'  => 'required',
            'txtDescription'  => 'required',
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //echo "<pre>"; print_r($validatedData); die();

        if ($validatedData->fails()) {
            return redirect('home')
                        ->withErrors($validatedData)
                        ->withInput();
        }

        $image = $request->file('image');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/images');

        $image->move($destinationPath, $input['imagename']);


        //$this->postImage->add($input['imagename']);

        $user = Auth::user();
        $Card = new Card();
        $Card->created_by = $Card->updated_by = $user->id;
        $Card->card_name = $request->input('txtName');
        $Card->description = $request->input('txtDescription');
        $Card->image = $input['imagename'];
        $Card->save();

        //$Card = Card::all();


        return back()->with('success','Card Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = Card::find($id);
        return json_encode($card);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = Validator::make($request->all(), [
            'txtName'  => 'required',
            'txtDescription'  => 'required'
        ]);

        //echo "<pre>"; print_r($validatedData); die();

        if ($validatedData->fails()) {
            return redirect('home')
                        ->withErrors($validatedData)
                        ->withInput();
        }
        $Card = Card::find($id);
        $user = Auth::user();
        if(!empty($request->file('image'))){

            $image = $request->file('image');

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/images');

            $image->move($destinationPath, $input['imagename']);
            $Card->updated_by = $user->id;
            $Card->image = $input['imagename'];
            $Card->save();
        }else{

            $Card->updated_by = $user->id;
            $Card->card_name = $request->input('txtName');
            $Card->description = $request->input('txtDescription');
            $Card->save();
        }

        return back()->with('success','Card Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Card = Card::where('id',$id);
        $Card->delete();
        return json_encode('success');
    }
}
