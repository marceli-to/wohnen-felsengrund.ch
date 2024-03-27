@extends('app')
@section('seo_title', 'Wohnen im schönen Zürcher Oberland')
@section('seo_description', 'An der Pfaffbergstrasse in Pfäffikon ZH werden ab dem Sommer 2024 zwei moderne Mehrfamilienhäuser, in grüner Umgebung, mit je acht Eigentumswohnungen realisiert – drei im Erdgeschoss, drei im Obergeschoss und zwei im Attikageschoss. Es entstehen 3.5- und 4.5-Zimmerwohnungen, ideal für Paare an ruhiger Lage.')
@section('content')

<x-layout.section class="bg-white !p-0">
  <x-swiper>
    <x-swiper.slide :image="'wohnen-felsengrund-visualisierung-aussen-nord'" :alt="'Visualisierung Aussen Nord'" />
    <x-swiper.slide :image="'wohnen-felsengrund-visualisierung-aussen-sued'" :alt="'Visualisierung Aussen Süd'" />
    <x-swiper.slide :image="'wohnen-felsengrund-visualisierung-attika-essen'" :alt="'Visualisierung Attika Essen'" />
    <x-swiper.slide :image="'wohnen-felsengrund-visualisierung-attika-schlafzimmer'" :alt="'Visualisierung Attika Schlafzimmer'" />
    <x-swiper.slide :image="'wohnen-felsengrund-visualisierung-wohnzimmer-eg'" :alt="'Visualisierung Wohnzimmer EG'" />
  </x-swiper>
</x-layout.section>

<x-layout.section class="bg-white">
  <x-layout.inner>
    <div class="max-w-4xl">
      <h1>Wohnen im schönen Zürcher Oberland</h1>
      <p>An der <a href="https://maps.app.goo.gl/96gni24YkQ97FwuQA" target="_blank" title="Auf Googlemaps anzeigen" class="underline hover:no-underline underline-offset-4 decoration-1">Pfaffbergstrasse 2 und 4 in Pfäffikon ZH</a> werden ab dem Sommer 2024 zwei moderne Mehrfamilienhäuser, in grüner Umgebung, mit je acht Eigentumswohnungen realisiert – drei im Erdgeschoss, drei im Obergeschoss und zwei im Attikageschoss. Es entstehen 3.5- und 4.5-Zimmerwohnungen, ideal für Paare an ruhiger Lage.</p>
      <p>Haben wir Ihr Interesse geweckt? Gerne senden wir Ihnen weitere Informationen, sobald die Vermarktung startet. Bitte füllen Sie dazu das Kontaktformular aus.</p>
      <div class="mt-15 md:mt-25 md:flex space-y-10 md:space-y-0 md:space-x-15">
        <div>
          <a href="/media/downloads/wohnen-felsengrund-verkaufsplaene.pdf" 
            target="_blank" 
            title="Verkaufspläne herunterladen"
            class="bg-caramel rounded-sm font-semi font-semibold inline-flex text-white uppercase py-10 px-20 tracking-wider leading-none hover:bg-charcoal transition-colors">
            Verkaufspläne
          </a>
        </div>
        <div>
          <a href="/media/downloads/wohnen-felsengrund-untergeschoss-und-tiefgaragenplan.pdf" 
            target="_blank" 
            title="Untergeschoss / Tiefgaragenplan herunterladen"
            class="bg-caramel rounded-sm font-semi font-semibold inline-flex text-white uppercase py-10 px-20 tracking-wider leading-none hover:bg-charcoal transition-colors">
            UG- und TG-Pläne
          </a>
        </div>
        <div>
          <a href="/media/downloads/wohnen-felsengrund-umgebungsplan.pdf" 
            target="_blank" 
            title="Umgebungsplan herunterladen"
            class="bg-caramel rounded-sm font-semi font-semibold inline-flex text-white uppercase py-10 px-20 tracking-wider leading-none hover:bg-charcoal transition-colors">
            Umgebungsplan
          </a>
        </div>
      </div>
    </div>
  </x-layout.inner>
</x-layout.section>

<x-layout.section class="bg-caramel text-white">
  <x-layout.inner>
    <h2 class="text-white">Kontaktformular</h2>
    @livewire('create-inquiry')
  </x-layout.inner>
</x-layout.section>

@endsection