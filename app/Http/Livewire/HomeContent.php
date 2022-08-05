<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\CategoryModel;
use Auth;
use App\Product;
use App\BannerModel;

class HomeContent extends Component
{
    public $categories, $product, $dealsOfTheMonth, $doublebanner, $feathureProduct, $feathureProductCat;

    public function render()
    {
        return view('livewire.home-content');
    }

    public function mount()
    {
        // 1. Categories product area start
        $this->categories = CategoryModel::where('parent_id',0)->where('status',1)->get();

        // This is common
        $user=Auth::user();
        $product = Product::with(['productImage','wishlist'=>function($query) use ($user)
            {$query->select('*')->where('user_id',isset($user)?$user->id:'');
        }])
            //->where('type',1) // Type needed to switch
            ->where('status',1)
            ->where('qty','!=',0)
            ->orderBy('qty','DESC');

        // 2. deals of the month product area start
        $this->product = $product->where('type', 1)->get();
        $cate = [];
        foreach($this->product as $productdetails){
            $cate[]=$productdetails['supercategory_id'];
        }
        $this->dealsOfTheMonth = CategoryModel::whereIn('id',$cate)->get();

        // 3. Double banner
        $this->doublebanner = BannerModel::where('status',1)->where('type',3)->get();

        // 4. featured product 
        $this->feathureProduct = $product->where('type', 2)->get();
        $cate2 = [];
        foreach($this->feathureProduct as $productdetails){
            $cate2[]=$productdetails['supercategory_id'];
        }
        $this->feathureProductCat = CategoryModel::whereIn('id',$cate2)->get();
    }
}
