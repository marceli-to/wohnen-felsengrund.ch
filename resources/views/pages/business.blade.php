@extends('app')
@section('seo_title', 'Gewerbe')
@section('seo_description', 'Einst der Hauptsitz der Zürich Versicherungs-Gesellschaft AG und bald ein neues lebendiges Quartier zum Wohnen und Arbeiten. An der Austrasse/Wiedingstrasse entstehen drei neue architektonisch beeindruckende Gebäude, welche sich in die Natur und dem Moränenhügel gut einfügen.')
@section('content')
<x-layout.section class="!p-0">
  <x-misc.pattern class="hidden sm:block right-0 sm:w-[25%] md:w-[33.333%]" />
  <x-layout.inner class="px-20 lg:px-0 py-30 lg:py-50 relative z-10">
    <h1>Gewerbe</h1>
    <x-layout.grid>
      <x-layout.span class="hyphens-auto">
        <p>Bald verfügt das Quartier Altwiedikon über ein neues lebendiges Quartier zum Wohnen und Arbeiten. An der <span class="hyphens-none">Austrasse</span>/<span class="hyphens-none">Wiedingstrasse</span> entstehen drei neue architektonisch beeindruckende Gebäude, welche sich in die Natur und dem Moränenhügel gut einfügen. Neben den verschiedensten Wohnungen, entstehen im Erdgeschoss an der Austrasse 46/48 auch Gewerbeflächen ab 58 m<sup>2</sup> und bringen für unterschiedlichste Unternehmen grosses Potenzial mit sich.</p>
        <p>Ob als Büro, Verkaufsladen oder Kita – die Gewerbeflächen im neuen Quartier ermöglichen eine vielseitige Nutzung und damit eine breite Angebotsvielfalt. Mit dem Mix aus Wohnen und Arbeiten sowie der pulsierenden Umgebung der Stadt Zürich, ist die Austrasse ein idealer Standort für Kleingewerbe. Die Bewohnerinnen und Bewohner des Quartiers bergen grosses Kundenpotenzial, ebenso jene Menschen, die in der Nachbarschaft leben oder arbeiten.</p>
        <p>Vermietet im Rohbau II, stehen Ihnen die ab 58 m<sup>2</sup> grosse Flächen ab 1. Mai 2024 zur Verfügung und können nach Ihren Wünschen ausgebaut und gestaltet werden.</p>
        <p>Dank des direkt angrenzenden Bahnhof Binz sowie der unweit entfernten Bushaltestelle Manesseplatz bietet der Standort eine ideale Erreichbarkeit für Kunden und Mitarbeitende. Die hauseigene Einstellhalle rundet das hochwertige Angebot ab.</p>
        <p>Ihre Vorteile auf einen Blick:</p>
        <ul>
          <li>Flächen ab 58 m<sup>2</sup> bis 240 m<sup>2</sup></li>
          <li>Bodenbelastung 3kN/m<sup>2</sup></li>
          <li>Raumhöhe von 3.00 m bis 3.40 m</li>
          <li>Maximal flexibel dank mehreren Zugängen (Aussenzugang sowie Zugang über Treppenhaus)</li>
          <li>Beschriftung der Schaufenster möglich</li>
          <li>Anmietbare Lagerflächen</li>
          <li>Anmietbare Einstellplätze (mit Ladestation möglich)</li>
        </ul>
      </x-layout.span>
      <x-layout.span>
        <a data-fancybox href="/media/img/austrasse_zuerich_laden_10-lg.jpg">
          <x-media.picture :image="'austrasse_zuerich_laden_10'" :alt="'Wohnen Felsengrund – Gewerbe'" />
        </a>
        <a data-fancybox href="/media/img/austrasse_zuerich_bueros_09-lg.jpg">
          <x-media.picture :image="'austrasse_zuerich_bueros_09'" :alt="'Wohnen Felsengrund – Büro'" class="mt-20 lg:mt-40" />
        </a>
      </x-layout.span>
    </x-layout.grid>
  </x-layout.inner>
</x-layout.section>
<x-layout.section class="bg-white">
  <x-layout.inner data-building-group="3">
    <h2>Angebot</h2>
    <x-layout.grid class="sm:!block md:!grid md:grid-cols-12 md:gap-24 lg:gap-32">
      <x-layout.span class="hidden md:block md:col-span-5 lg:col-span-5 2xl:col-span-6">
        <div class="md:sticky md:top-75">
          <x-apartments.iso.wrapper number="3" />
        </div>
      </x-layout.span>
      <x-layout.span class="md:col-span-7 lg:col-span-7 2xl:col-span-6 md:overflow-auto">
        <x-apartments.wrapper number="3" address="Austrasse 46/48" class="!bg-white overflow-auto">
          <x-apartments.table 
            :apartments="$apartments"
            type="business"
            building="3" 
            classHeader="bg-white" />
        </x-apartments.wrapper>
      </x-layout.span>
    </x-layout.grid>
  </x-layout.inner>
  <x-apartments.cart type="commercial" />
  <x-apartments.show />
</x-layout.section>
<x-layout.section class="">
  <x-layout.inner>
    <div>
      <h2>Kontakt</h2>
      <p>Haben wir Ihr Interesse geweckt?<br>Gerne stehen wir für Fragen zur Verfügung und freuen uns auf Ihre Kontaktaufnahme.</p>
      <p><strong>Hinweis:</strong> Dieses Kontaktformular wird ausschliesslich für gewerbliche Anfragen verwendet. Wohnungsanfragen werden nicht berücksichtigt.</p>
      @livewire('create-inquiry')
    </div>
  </x-layout.inner>
</x-layout.section>
@endsection