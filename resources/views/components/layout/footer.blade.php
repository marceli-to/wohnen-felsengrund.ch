@if (!Route::is('page.privacy') && !Route::is('page.imprint'))
<x-layout.section class="relative !p-0">
  <x-misc.map />
</x-layout.section>
@endif
<footer>
  <div class="px-15 py-15 md:px-25 md:py-25">
    <x-layout.inner>
      <x-layout.grid>
        <x-layout.span class="sm:col-span-6 md:col-span-3">
          <div class="text-serene font-semi">
            Apleona Schweiz AG
          </div>
          <p>
            Industriestrasse 21<br>
            8304 Wallisellen
          </p>
        </x-layout.span>
        <x-layout.span class="sm:col-span-6 md:col-span-3">

        </x-layout.span>
      </x-layout.grid>
    </x-layout.inner>
  </div>
  <div class="bg-caramel text-white text-xs lg:text-sm py-10 px-15 md:px-25">
    <x-layout.inner>
      <nav>
        <ul class="flex gap-x-15 lg:gap-x-20">
          <li>
            <a href="{{ route('page.imprint') }}" title="Impressum" class="{{ Route::is('page.imprint') ? 'text-serene' : '' }} hover:text-serene transition-colors">Impressum</a>
          </li>
          <li>
            <a href="{{ route('page.privacy') }}" title="Datenschutz" class="{{ Route::is('page.privacy') ? 'text-serene' : '' }} hover:text-serene transition-colors">Datenschutz</a>
          </li>
          <li>
            <a href="https://stoz.ch" target="_blank" title="stoz.ch" rel="noopener" class="hover:text-serene transition-colors">design by stoz</a>
          </li>
        </ul>
      </nav>
    </x-layout.inner>
  </div>
</footer>
@livewireScripts
@vite('resources/js/app.js')
{{-- 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RWPD2SW544"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-RWPD2SW544');
</script>
--}}
</body>
</html>
<!-- made with ❤ by stoz.ch & marceli.to -->