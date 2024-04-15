<?php

namespace Tests\Feature\Livewire;

use App\Livewire\UserForm;
use Livewire\Livewire;
use Tests\TestCase;

class UserFormTest extends TestCase
{
    /**
     * Test that the user form renders
     * @test
     */
    public function renders_successfully(): void
    {
        Livewire::test(UserForm::class)
            ->assertStatus(200);
    }

    /**
     * Test that the user form is in an errant state when form values are invalid
     * @test
     */
    public function has_errors_when_invalid(): void
    {
        Livewire::test(UserForm::class)
            ->call('submit')
            ->assertHasErrors();
    }

    /**
     * Test that the user form is in a valid state when form values are valid
     * @test
     */
    public function has_no_errors_when_valid(): void
    {
        Livewire::test(UserForm::class)
            ->set('firstName', 'John')
            ->set('lastName', 'Doe')
            ->set('address', '123 Happy St')
            ->set('city', 'New York')
            ->set('country', 'USA')
            ->set('dateOfBirth', '2000-10-21 00:00:00')
            ->set('married', 'yes')
            ->set('marriageDate', '2020-12-01 00:00:00')
            ->set('marriageCountry', 'USA')
            ->call('submit')
            ->assertHasNoErrors();
    }

    /**
     * Test that form shows the results page upon submission of valid form values
     * @test
     */
    public function show_results_when_valid(): void
    {
        Livewire::test(UserForm::class)
            ->set('firstName', 'John')
            ->set('lastName', 'Doe')
            ->set('address', '123 Happy St')
            ->set('city', 'New York')
            ->set('country', 'USA')
            ->set('dateOfBirth', '2000-10-21 00:00:00')
            ->set('married', 'yes')
            ->set('marriageDate', '2020-12-01 00:00:00')
            ->set('marriageCountry', 'USA')
            ->call('submit')
            ->assertSet('page', 3);
    }
}
