<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardRujukan extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $noKartu;

    public function __construct($noKartu)
    {
        $this->noKartu = $noKartu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-rujukan');
    }
}
