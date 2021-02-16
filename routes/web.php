<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

///front section 
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',function(){
    return view('front.common.comingsoon');
});
Route::get('/home','HomeController@index');
Route::any('/register','HomeController@Register')->name('Register');
Route::get('/login','HomeController@Login')->name('Login page');
Route::post('/user/verifyuser','LoginController@validateUser')->name('Verify User');
Route::any('/user/logout','LoginController@logout')->name('User Logout');



Route::any('/{slug}','HomeController@ProuctList')->name('Product list');
Route::any('/product_details/{slug}','HomeController@ProuctDetails')->name('Product details');

//User Cart

Route::any('ajax/add_to_cart','CartController@AddtoCart')->name('Add to cart');
Route::any('ajax/remove_cart','CartController@removecart')->name('Remove from cart');
Route::any('user/cart_details','CartController@index')->name('Cart Details');
Route::any('user/updatecart','CartController@updateCart')->name('Update Cart');

///User Checkout

Route::any('user/checkout','CheckoutController@Checkout')->name('Checkout Details');

///Wishlist
Route::any('user/wishlist/{product_id}','WishlistController@CreateandUpdate')->name('Add and Remove from wishlist');



///Admin section start

Route::namespace('Admin')->prefix('admin')->as('admin.')->group(function(){

    Route::get('/login','LoginController@adminLogin');
    Route::post('/validate','LoginController@validateUser');
    Route::get('/dashboard', 'LoginController@dashboard')->middleware('CheckSession');
    Route::any('/logout','LoginController@logout');
    Route::any('/profile','LoginController@Profile');
    Route::any('/update/password','LoginController@UpdatePassword');
    Route::any('/update/profile','LoginController@UpdateProfile');
    
    
    ///Common Controller for status
    Route::get('/update-status/{table}/{pk}/{current}', 'CommonController@updateStatus');


    ///Category 

    Route::get('/category','CategoryController@index')->name('View Category');
    Route::any('/category/add-category','CategoryController@addCategory')->name('Add Category');
    Route::any('/category/edit-category/{id}', 'CategoryController@editCategory')->name('Edit Category'); 
    Route::get('/category/delete-category/{id}','CategoryController@deleteCategory')->name('Delete Category');
    

    ///Banners 
    Route::get('/banner','BannerController@index')->name('View Banner');
    Route::any('/banner/add-banner/','BannerController@addbanner')->name('Add Banner');
    Route::any('/banner/edit-banner/{id}','BannerController@editbanner')->name('Edit Banner');
    Route::any('/banner/delete-banner/{id}','BannerController@deletebanner')->name('Delete Banner');

    

    ///Products
    Route::get('/product','ProductController@index')->name('Veiw Product');
    Route::any('/product/add-product','ProductController@addProduct')->name('Add Product');
    Route::any('/product/edit-product/{id}','ProductController@editProduct')->name('Edit Product');
    Route::any('/getcategory/{id}','ProductController@getCategory')->name('Fetch Category');
    Route::any('/remove-image/{id}','ProductController@removeCategory')->name('Remove Product Image');
    Route::any('/product/delete-product/{id}','ProductController@deleteProduct')->name('Delete Product');


    //Brand
    Route::get('/brand','BrandController@index')->name('View Brand');
    Route::any('/brand/add-brand','BrandController@addBrand')->name('Add Brand');
    Route::any('/brand/edit-brand/{id}', 'BrandController@editBrand')->name('Edit Brand'); 
    Route::get('/brand/delete-brand/{id}','BrandController@deleteBrand')->name('Delete Brand');
    
    //Rating
    Route::get('/rating','RatingController@index')->name('View Rating');
    Route::any('/rating/add-rating','RatingController@addRating')->name('Add Rating');
    Route::any('/rating/edit-rating/{id}', 'RatingController@editRating')->name('Edit Rating'); 
    Route::get('/rating/delete-rating/{id}','RatingController@deleteRating')->name('Delete Rating');
   
    //coupons
    Route::get('/coupon','CouponController@index')->name('View Coupon');
    Route::any('/coupon/add-coupon','CouponController@addCoupon')->name('Add Coupon');
    Route::any('/coupon/edit-coupon/{id}', 'CouponController@editCoupon')->name('Edit Coupon'); 
    Route::get('/coupon/delete-coupon/{id}','CouponController@deleteCoupon')->name('Delete Coupon');


    //social links
    Route::get('/social_links','SocialController@index')->name('View Social Links');
    Route::any('/social/add-social','SocialController@addSocialLinks')->name('Add Social Links');
    Route::any('/social/edit-social/{id}', 'SocialController@editSocialLinks')->name('Edit Social Links'); 
    Route::get('/social/delete-social/{id}','SocialController@deleteSocialLinks')->name('Delete Social Links');


     //coupons
     Route::get('/role','RoleController@index')->name('View  Role');
     Route::any('/role/add-role','RoleController@addRole')->name('Add  Role');
     Route::any('/role/edit-role/{id}', 'RoleController@editRole')->name('Edit  Role'); 
     Route::get('/role/delete-role/{id}','RoleController@deleteRole')->name('Delete Role');

     //admin users

     Route::get('/admin_users','CommonController@index')->name('View  Users');
     Route::any('/admin_users/add-user','CommonController@addUser')->name('Add  Users');
     Route::any('/admin_users/edit-user/{id}', 'CommonController@editUser')->name('Edit  Users'); 
     Route::get('/admin_users/delete-user/{id}','CommonController@deleteUser')->name('Delete Users');
     Route::get('/user_logs','CommonController@Userlogs')->name('Login Log');

    
      //front users
      Route::get('/front_users','CommonController@Users')->name('View  Users');

      //forget password
      Route::any('/forget_passord','LoginController@ForgetPassword')->name('Forget Password');
      Route::any('/reset_password/{token}','LoginController@ResetPassword')->name('Reset Password');
       

      Route::get('/under-construction',function(){

        return view('underconstruction');
      });

});
