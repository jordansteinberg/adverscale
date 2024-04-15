<div {{ $attributes->merge(['class' => 'form-field']) }}
    x-data="{
        month: null,
        date: null,
        year: 2000,
        dateString: '',
        initialize(value) {
            if (value) {
                const date = new Date(value);
                if (!isNaN(date)) {
                    this.month = date.getUTCMonth() + 1;
                    this.date = date.getUTCDate();
                    this.year = date.getUTCFullYear();
                    this.updateDateString();
                }
            }
        },
        updateDateString() {
            this.dateString = this.year + '-' + (('0' + this.month).slice(-2)) + '-' + ('0' + this.date).slice(-2) + ' 00:00:00';
        },
        updateValue() {
            this.updateDateString();
            document.getElementById('{{$id}}').value = this.dateString;
            document.getElementById('{{$id}}').dispatchEvent(new Event('input'));
        }
    }"
    x-init="initialize($wire.{{ $attributes->get('wire:model') }})"
>
    @if($attributes->has('label'))
    <label for="{{$id}}-month">{{$attributes->get('label')}}</label>
    @endif

    <div>
        <select x-model="month" x-on:change.debounce="updateValue()">
            <option value="null">-</option>
            @for ($i = 1; $i <= 12; $i++)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
        /
        <select x-model="date" x-on:change.debounce="updateValue()">
            <option value="null">-</option>
            @for ($i = 1; $i <= 31; $i++)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
        /
        <select x-model="year" x-on:change.debounce="updateValue()">
            @for ($i = 1900; $i <= 2023; $i++)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
    </div>
    @error($attributes->get('wire:model')) <span class="error">{{ $message }}</span> @enderror
    <input type="hidden" id="{{$id}}" {{ $attributes->only('wire:model') }} />
</div>
