
<div>
    @if ($errors->any())
    <div class="error-notice">
        There were some errors.
    </div>
    @endif

    <form wire:submit.prevent="submit" method="post">
        @if ($page === 1)
        <x-textfield label="First Name" wire:model="firstName"></x-textfield>
        <x-textfield label="Last Name" wire:model="lastName"></x-textfield>
        <x-textfield label="Address" wire:model="address"></x-textfield>
        <x-textfield label="City" wire:model="city"></x-textfield>
        <x-textfield label="Country" wire:model="country"></x-textfield>
        <x-datepicker id="yoyo" label="Date of Birth" wire:model="dateOfBirth"></x-datepicker>

        <button type="button" wire:click="$set('page', 2)">Next</button>
        @endif

        @if ($page === 2)
        <div x-data="{ married: $wire.married }">
            <div class="form-field">
                <label>Are you married?</label>
                <div>
                    <label class="inline">
                        <input wire:model="married" type="radio" value="yes" @click="married = 'yes'" />
                        Yes
                    </label>
                    <label class="inline">
                        <input wire:model="married" type="radio" value="no" @click="married = 'no'" />
                        No
                    </label>
                </div>
                @error('married') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div x-show="married === 'yes'">
                <x-datepicker label="Date of Marriage" wire:model="marriageDate"></x-datepicker>
                <x-textfield label="Country of Marriage" wire:model="marriageCountry"></x-textfield>
            </div>
            <div x-show="married === 'no'">
                <div class="form-field">
                    <label>Are you widowed?</label>
                    <label class="inline"><input wire:model="widowed" type="radio" value="yes" /> Yes</label>
                    <label class="inline"><input wire:model="widowed" type="radio" value="no" /> No</label>
                    @error('widowed') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-field">
                    <label>Have you ever been married in the past?</label>
                    <label class="inline"><input wire:model="previouslyMarried" type="radio" value="yes" /> Yes</label>
                    <label class="inline"><input wire:model="previouslyMarried" type="radio" value="no" /> No</label>
                    @error('previouslyMarried') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>


        <button type="button" wire:click="$set('page', 1)">Previous</button>
        <button type="submit">Submit</button>
        @endif

        @if ($page === 3)
        <p>
            You entered the following values:
        </p>

        <dl>
            <dt>First Name:</dt>
            <dd>{{$firstName}}</dd>
            <dt>Last Name:</dt>
            <dd>{{$lastName}}</dd>
            <dt>Address:</dt>
            <dd>{{$address}}</dd>
            <dt>City:</dt>
            <dd>{{$city}}</dd>
            <dt>Country:</dt>
            <dd>{{$country}}</dd>
            <dt>Date of birth:</dt>
            <dd>{{$dateOfBirth}}</dd>
            <dt>Are you married?</dt>
            <dd>{{$married}}</dd>
            @if ($married === 'yes')
            <dt>Date of marriage:</dt>
            <dd>{{$marriageDate}}</dd>
            <dt>Country of marriage:</dt>
            <dd>{{$marriageCountry}}</dd>
            @else
            <dt>Are you widowed?</dt>
            <dd>{{$widowed}}</dd>
            <dt>Have you ever been married in the past?</dt>
            <dd>{{$previouslyMarried}}</dd>
            @endif
        </dl>
        @endif
    </form>
</div>
