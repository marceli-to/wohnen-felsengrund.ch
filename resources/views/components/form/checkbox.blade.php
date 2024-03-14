@props(['id' => '', 'name'])
<input 
  type="checkbox" 
  wire:model="{{ $name }}" 
  name="{{ $name }}" 
  id="{{ $id }}"
  {{ $attributes->merge(['class' => 'appearance-none w-14 h-14 lg:w-18 lg:h-18 ring-0 focus:ring-0 !ring-offset-0 !outline-none !border-none text-olive bg-white accent-serene']) }}>