<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Generic textfield component
 */
class Textfield extends Component
{
    /**
     * Holds the generated ID which is used in lieu of a provided ID in component attributes
     * @var string
     */
    private string $generatedId;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->generatedId = uniqid('textfield-');
    }

    /**
     * Gets the user-defined id by default, or generates a random (enough for this demo) id if none is set
     * @return string
     */
    public function id(): string
    {
        return $this->attributes->get('id') ?? $this->generatedId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.textfield');
    }
}
