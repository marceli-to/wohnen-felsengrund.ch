@props(['type' => 'submit'])
<button type="{{ $type }}" {{ $attributes->merge(['class' => 'bg-olive font-semi font-normal flex text-white py-12 px-12 leading-none hover:bg-white hover:text-olive transition-colors']) }}>
  {{ $slot}}
</button>