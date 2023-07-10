<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookingsTable extends Component
{
    public $bookings;
    /**
     * Create a new component instance.
     */
    public function __construct($bookings)
    {
        $this->bookings = $bookings;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bookings-table');
    }
}
