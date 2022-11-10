<?php

namespace App\View\Components;

use App\Models\Notification;
use Illuminate\View\Component;

class HeaderApp extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $notifications = Notification::where('user_id', auth()->user()->id)->get();
        return view('components.header-app', compact(['notifications']));
    }
}
