@props(['route', 'title' => ''])
<li>
  <a 
    href="{{ route($route) }}" 
    title="{{ $title }}"
    {{ $attributes->merge(['class' => 'block py-4 lowercase font-semi font-normal text-md xl:text-lg md:mr-20 xl:mr-28 hover:text-serene transition-colors']) }}>
    {{ $title }}
  </a>
</li>