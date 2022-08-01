<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\NotificationModel;

class Notification extends Component
{
    public $notification;

    public function mount(){

        $this->notification = NotificationModel::with('users')
            ->where(['is_seen' => 0, 'trash' => 0, 'status' => 1])
            ->get();

    }
    public function render()
    {
        return view('livewire.admin.notification');
    }
}
