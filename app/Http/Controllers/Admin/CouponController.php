<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CouponModel;
use  Validator;

class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('CheckSession');
    }
    
    public function index(Request $request)
    {
        $data=CouponModel::orderBy('id','DESC')->get();
        return view('admin.coupon.index',compact('data'));
    }
     /**
     * Add Static page 
     * @method addStaticPage
     * @param null
     */
    public function addCoupon(Request $request)
    {
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'title' => 'required',
                'code' => 'required|unique:coupons',
                'discount' => 'required',
                'starting_at' => 'required',
                'end_at' => 'required|after_or_equal:starting_at',
                'notes' => 'required',
            ]);

            $data=$request->all();
        //    dd($data);
            CouponModel::Create($data);
            return redirect('admin/coupon')->with('success','Coupon added successful');
        }
       return view('admin.coupon.add');
    }

     /**
     * Edit & update coupon page detail
     * @method editcoupon
     * @param page_id
     */
    public function editCoupon(Request $request,$id=null)
    {
        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'title' => 'required',
                'code' => 'required',
                'discount' => 'required',
                'starting_at' => 'required',
                'end_at' => 'required',
                'notes' => 'required',
            ]);
            $data=$request->except('_token');
            $update =CouponModel::where('id',$id)->update($data);
            if($update){
                return redirect('/admin/coupon')->with('success','Coupon updated successful');
            }

        }
        
        $page=CouponModel::where('id',$id)->first();
       
        return view('admin.coupon.edit',compact('page'));
    }
    /**
     * Delete page
     * @method deletePage
     * @param page id
     */
    public function deleteCoupon($id=null)
    {
        $deleted = CouponModel::where('id',$id)->delete();
            if($deleted){
                return redirect('/admin/coupon')->with('success','Data deleted successful');
            }
    }
}
