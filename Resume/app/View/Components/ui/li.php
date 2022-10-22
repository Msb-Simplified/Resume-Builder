<?php

namespace App\View\Components\ui;

use Illuminate\View\Component;

class li extends Component
{

    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type=null)
    {
        $this->type = $type;
    }

    public function isActive(){
        if($this->type == "active"){
            return 'text-danger';
        }

        
        return 'text-dark';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ui.li');
    }
}
