<?php

namespace App\Livewire;

use Illuminate\Validation\Rule;
use Livewire\Component;

/**
 * Defines the user form
 */
class UserForm extends Component
{
    /** @var int Tracks the current displayed page */
    public int $page = 1;

    // wire model variables tied to form fields
    public string | null $firstName = null;
    public string | null $lastName = null;
    public string | null $address = null;
    public string | null $city = null;
    public string | null $country = null;
    public string | null $dateOfBirth = null;
    public string | null $married = null;
    public string | null $marriageDate = null;
    public string | null $marriageCountry = null;
    public string | null $previouslyMarried = null;
    public string | null $widowed = null;

    /**
     * Defines validation rules for form fields
     * @return array
     */
    protected function rules(): array
    {
        return [
            'firstName'    => 'required',
            'lastName'   => 'required',
            'address'   => 'required',
            'city'   => 'required',
            'country' => 'required',
            'dateOfBirth' => 'required|date_format:Y-m-d H:i:s',
            'married' => 'required',
            'marriageDate' => [
                'required_if:married,yes',
                Rule::when(
                    $this->married === 'yes',
                    ['date_format:Y-m-d H:i:s'],
                    ['nullable']
                )
            ],
            'marriageCountry' => 'required_if:married,yes',
            'previouslyMarried' => 'required_if:married,no',
            'widowed' => 'required_if:married,no'
        ];
    }

    /**
     * Defines default error message overrides for applicable fields
     * @return string[]
     */
    protected function messages(): array
    {
        return [
            'dateOfBirth' => 'The date of birth must be a valid date.',
            'marriageDate' => 'The marriage date must be a valid date.'
        ];
    }

    /**
     * Handles submit action of form
     * @return void
     */
    public function submit(): void
    {
        $this->validate();
        // page 1 and 2 are form steps, page 3 is the display step
        $this->page = 3;
    }
}
