<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SocialLinksModel;

class SocialController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('CheckSession');
    }
    
    public function index(Request $request)
    {
        $data=SocialLinksModel::get();
        return view('admin.sociallinks.index',compact('data'));
    }
     /**
     * Add Static page 
     * @method addStaticPage
     * @param null
     */
    public function addSocialLinks(Request $request)
    {
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'title' => 'required',
                'links' => 'required',
            ]);

            $data=$request->all();
            SocialLinksModel::Create($data);
            return redirect('admin/social_links')->with('success','Social Link  added successful');
        }
       return view('admin.sociallinks.add');
    }


     /**
     * Edit Rating
     * @method editRating
     * @param null
     */
    public function editSocialLinks(Request $request,$id=null)
    {
        if($request->isMethod("post")){
             
            $validateData=$request->validate([
            'title'=>'required',
             'links'=>'required',
            ]);
            try{
                $data=$request->except('_token');

                $rating=SocialLinksModel::where('id',$id)->update($data);
                return redirect('admin/social_links')->with('success','Data Updated Successfull');

            }
            catch(\Exception $e){
                return redirect('admin/social/edit-social/'.$id)->with('error',$e->getMessage());
            }
        }
        $editData=SocialLinksModel::where('id',$id)->first();
        return view('admin.sociallinks.edit',compact('editData'));
    }
    public function deleteSocialLinks($id=null)
    {
        $result=SocialLinksModel::where('id',$id)->delete();
        if($result){
            return redirect('admin/social_links')->with('success','Rating Updated Successfull');

        }
    }

}
