@props(['type' => 'text', 'placeholder' => '', 'name', 'isWire' => false])
@if ($isWire)
  <input 
    type="{{ $type }}" 
    wire:model="{{ $name }}" 
    placeholder="{{ $placeholder }}" 
    class="bg-white text-base lg:text-md xl:text-lg w-full ring-0 focus:ring-0 border-none text-olive placeholder:text-serene">
@else
  <input 
    type="{{ $type }}" 
    name="{{ $name }}" 
    placeholder="{{ $placeholder }}" 
    class="text-base lg:text-md xl:text-lg w-full ring-0 focus:ring-0 border-none bg-serene text-white placeholder:text-white">
@endif