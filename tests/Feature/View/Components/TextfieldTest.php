<?php

namespace Tests\Feature\View\Components;

use Livewire\Component;
use Livewire\Livewire;
use Tests\TestCase;

class TextfieldTest extends TestCase
{
    /**
     * Test that the textfield renders correctly, including all elements expected
     */
    public function test_renders_correctly(): void
    {
        $view = Livewire::test(new class() extends Component
        {
            public function render(): string
            {
                return <<<'BLADE'
                <div>
                    <x-textfield label="Enter Text" id="TestId" wire:model="enteredText" />
                </div>
                BLADE;
            }
        });

        $view->assertSeeHtml('<label for="TestId">Enter Text</label>');
        $view->assertSeeHtml('<input type="text" id="TestId" class="" label="Enter Text" wire:model="enteredText" />');
    }
}
