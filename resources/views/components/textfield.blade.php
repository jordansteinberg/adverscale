<div {{ $attributes->merge(['class' => 'form-field']) }}>
    @if($attributes->has('label'))
    <label for="{{$id}}">{{$attributes->get('label')}}</label>
    @endif
    <input type="text" id="{{$id}}" class="@error($attributes->get('wire:model')) error @enderror" {{ $attributes->except('id')->except('class') }} />
    @error($attributes->get('wire:model')) <span class="error">{{ $message }}</span> @enderror
</div>
