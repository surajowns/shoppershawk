<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\CategoryModel;
use Cart;
use Auth;
use App\CartModel;
use App\Wishlist;

class Header extends Component
{
    public $categories, $subcategories, $cartdetails, $user, $subtotal=0, $totalincart, $wishlist;

    public function render()
    {
        return view('livewire.header');
    }

    public function mount()
    {
        $this->categories = CategoryModel::where('parent_id',0)->where('status',1)->limit(6)->get();
        $this->subcategories = CategoryModel::where('parent_id','!=',0)->where('status',1)->get();

        $this->cartdetails = Cart::getContent(); 
        $user = Auth::user();

        if($user){  
            $this->cartdetails = CartModel::with('products','products.productImage')->where('user_id',$user['id'])->get();
            $this->totalincart = count($this->cartdetails);
            foreach($this->cartdetails as $data){
                $this->subtotal = $this->subtotal + $data['quantity'] * $data['price'];
            }
            $this->wishlist = Wishlist::where('user_id',$user->id)->get()->count();
        }else{
            $this->wishlist = 0;
        }
    }
}
