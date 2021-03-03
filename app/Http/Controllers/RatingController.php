<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RatingModel;
use Auth;
class RatingController extends Controller
{

    public function __construct()
    {
        $this->middleware('UserSession');
    }
    public function Createreview(Request $request)
    {     
        $user=Auth::user();
          $data=$request->except('_token');
          $data['user_id']=$user->id;
          RatingModel::create($data);
          return back()->with('success','Rating added Successfull');
         

    }
}
