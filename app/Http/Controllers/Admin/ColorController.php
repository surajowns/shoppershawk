<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Color;
class ColorController extends Controller
{
    public function Index(Request $request)
    {
            $color=Color::get();
            return view('admin.colors.view',compact('color'));
    }
    public function Addcolor(Request $request)
    {
           if($request->isMethod('post')){
                  $data=$request->except(['_token']);
                  Color::Create($data);
                  return redirect('admin/color')->with('success','Color added successful');

           }
           return view('admin.colors.add');
    }
     /**
     * Edit & update coupon page detail
     * @method editcoupon
     * @param page_id
     */
    public function editColor(Request $request,$id=null)
    {
        if($request->isMethod('post')){
           
            $data=$request->except('_token');
            $update =Color::where('id',$id)->update($data);
            if($update){
                return redirect('/admin/color')->with('success','Color updated successful');
            }

        }
        
        $page=Color::where('id',$id)->first();
       
        return view('admin.colors.edit',compact('page'));
    }
    /**
     * Delete page
     * @method deletePage
     * @param page id
     */
    public function deleteColor($id=null)
    {
        $deleted = Color::where('id',$id)->delete();
            if($deleted){
                return redirect('/admin/color')->with('success','Data deleted successful');
            }
    }
}
