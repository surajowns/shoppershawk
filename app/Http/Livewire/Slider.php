<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\BannerModel;

class Slider extends Component
{
    public $topbanner;

    public function render()
    {
        return view('livewire.slider');
    }

    public function mount()
    {
        $this->topbanner = BannerModel::where('status',1)->where('type',1)->get();
    }
}