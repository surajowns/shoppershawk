<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RatingModel;
use Validator;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckSession');
    }
    
    public function index(Request $request)
    {
        $rating=RatingModel::with('users','products')->orderBy('id','DESC')->get()->toArray();
        return view('admin.rating.index',compact('rating'));
    }
    /**
     * Edit Rating
     * @method editRating
     * @param null
     */
    public function editRating(Request $request,$id=null)
    {
        if($request->isMethod("post")){
             
            $validateData=$request->validate([
            'rating'=>'required',
             'review'=>'required',
            ]);
            try{
                $data=$request->except('_token');

                $rating=RatingModel::where('id',$id)->update($data);
                return redirect('admin/rating')->with('success','Rating Updated Successfull');

            }
            catch(\Exception $e){
                return redirect('admin/rating/edit-rating/'.$id)->with('error',$e->getMessage());
            }
        }
        $editData=RatingModel::where('id',$id)->first();
        return view('admin.rating.edit',compact('editData'));
    }
    public function deleterating($id=null)
    {
        $result=RatingModel::where('id',$id)->delete();
        if($result){
            return redirect('admin/rating')->with('success','Rating Updated Successfull');

        }
    }
}
