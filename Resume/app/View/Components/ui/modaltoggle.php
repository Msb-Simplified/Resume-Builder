<?php

namespace App\View\Components\ui;

use Illuminate\View\Component;

class modaltoggle extends Component
{
    public $type,$id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$type=null)
    {
        $this->type = $type;
        $this->id = $id;
    }

    public function isActive(){
        if($this->type == "active"){
            return 'text-danger';
        }

        
        return 'text-dark';
    }
    public function modalid(){
        return $this->id;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ui.modaltoggle');
    }
}
