<?php

namespace Tests\Feature\View\Components;

use Livewire\Component;
use Livewire\Livewire;
use Tests\TestCase;

class DatepickerTest extends TestCase
{
    /**
     * Test that the datepicker renders correctly, including all elements expected
     */
    public function test_renders_correctly(): void
    {
        $view = Livewire::test(new class() extends Component
        {
            public function render(): string
            {
                return <<<'BLADE'
                <div>
                    <x-datepicker label="Choose Date" id="TestId" wire:model="selectedDate" />
                </div>
                BLADE;
            }
        });

        $view->assertSeeHtml('<label for="TestId-month">Choose Date</label>');
        $view->assertSeeHtml('<select x-model="month" x-on:change.debounce="updateValue()">');
        $view->assertSeeHtml('<select x-model="date" x-on:change.debounce="updateValue()">');
        $view->assertSeeHtml('<select x-model="year" x-on:change.debounce="updateValue()">');
        $view->assertSeeHtml('<input type="hidden" id="TestId" wire:model="selectedDate" />');
    }
}
