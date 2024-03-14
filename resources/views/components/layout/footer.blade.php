@if (!Route::is('page.privacy') && !Route::is('page.imprint'))
<x-layout.section class="relative !p-0">
  <x-misc.map />
</x-layout.section>
@endif
<footer>
  @if (!Route::is('page.privacy') && !Route::is('page.imprint'))
  <div class="px-15 py-20 md:px-25 md:py-30">
    <x-layout.inner>
      <x-layout.grid class="leading-[1.35]">
        <x-layout.span class="md:col-span-6 lg:col-span-5">
          <h3>Bauherrschaft</h3>
          <p>
            Temperli Immobilien AG<br>
            Hermatswilerstrasse 1<br>
            8330 Pfäffikon
          </p>
        </x-layout.span>
        <x-layout.span class="md:col-span-6 relative">
          <img 
            src="/media/img/logo-morf-bautreuhand.png" 
            alt="Morf Bautreuhand AG"
            class="hidden sm:block absolute sm:w-80 md:w-100 h-auto sm:-left-95 md:-left-120 top-6">
          <h3>Vermarktung</h3>
          <p>
            Morf Bautreuhand AG<br>
            Schickmattweg 8<br>
            8332 Russikon<br>
            <a 
              href="mailto:hello@wohnen-felsengrund.ch"
              class="no-underline hover:underline underline-offset-4 decoration-1">
              hello@wohnen-felsengrund.ch
            </a>
          </p>
        </x-layout.span>
      </x-layout.grid>
    </x-layout.inner>
  </div>
  @endif
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