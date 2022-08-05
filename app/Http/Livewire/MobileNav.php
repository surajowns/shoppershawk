<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\SocialLinksModel;
use App\CategoryModel;

class MobileNav extends Component
{
    public $sociallinks, $categories, $subcategories;

    public function render()
    {
        return view('livewire.mobile-nav');
    }

    public function mount()
    {
        $this->sociallinks = SocialLinksModel::where('status',0)->get();
        $this->categories = CategoryModel::where('parent_id',0)->where('status',1)->limit(6)->get()->toArray();
        $this->subcategories = CategoryModel::where('parent_id','!=',0)->where('status',1)->get()->toArray();
        
        // $this->categories = json_decode($categories);
        // $this->subcategories = json_decode($subcategories);
        // dd($this->categories);
    }
}
