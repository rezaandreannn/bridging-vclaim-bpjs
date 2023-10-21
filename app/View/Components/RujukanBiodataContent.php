<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RujukanBiodataContent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $key;
    public $value;
    public $status;

    public function __construct($key, $value, $status = false)
    {
        $this->key = $key;
        $this->value = $value;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.rujukan-biodata-content');
    }
}
