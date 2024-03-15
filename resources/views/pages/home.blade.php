@extends('app')
@section('seo_title', 'Wohnen im schönen Zürcher Oberland')
@section('seo_description', 'An der Pfaffbergstrasse in Pfäffikon ZH werden ab dem Sommer 2024 zwei moderne Mehrfamilienhäuser, in grüner Umgebung, mit je acht Eigentumswohnungen realisiert – drei im Erdgeschoss, drei im Obergeschoss und zwei im Attikageschoss. Es entstehen 3.5- und 4.5-Zimmerwohnungen, ideal für Paare an ruhiger Lage.')
@section('content')

<x-layout.section class="bg-white !p-0">
  <x-swiper>
    <x-swiper.slide :image="'wohnen-felsengrund-visualisierung-aussen-sued'" :alt="'Visualisierung Aussen Süd'" />
    <x-swiper.slide :image="'wohnen-felsengrund-visualisierung-aussen-nord'" :alt="'Visualisierung Aussen Nord'" />
  </x-swiper>
</x-layout.section>

<x-layout.section class="bg-white">
  <x-layout.inner>
    <div class="max-w-4xl">
      <h1>Wohnen im schönen Zürcher Oberland</h1>
      <p>An der Pfaffbergstrasse in Pfäffikon ZH werden ab dem Sommer 2024 zwei moderne Mehrfamilienhäuser, in grüner Umgebung, mit je acht Eigentumswohnungen realisiert – drei im Erdgeschoss, drei im Obergeschoss und zwei im Attikageschoss. Es entstehen 3.5- und 4.5-Zimmerwohnungen, ideal für Paare an ruhiger Lage.</p>
      <p>Haben wir Ihr Interesse geweckt? Gerne senden wir Ihnen weitere Informationen, sobald die Vermarktung startet. Bitte füllen Sie dazu das Kontaktformular aus.</p>
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