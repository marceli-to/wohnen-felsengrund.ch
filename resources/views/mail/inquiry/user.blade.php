<x-mail::message>
  <div class="text-base pb-base">
    Sehr geehrte Damen und Herren<br><br>
    Danke für Ihr Interesse an unserem Projekt «Felsengrund». Gerne kontaktieren wir Sie mit weiteren Informationen, wenn der offizielle Vermarktungsstart erfolgt.<br><br>
    Bis dahin wünschen wir Ihnen einen schönen Frühlingsstart.<br><br>
    Ihr Felsengrund-Team
  </div>
  <br>
  <div class="text-base pb-base">
    <strong>Ihre Angaben:</strong>
  </div>
  <div class="text-base pb-base">
    <strong>Vorname</strong><br>
    {{ $data->firstname }}
  </div>
  <div class="text-base pb-base">
    <strong>Name</strong><br>
    {{ $data->name }}
  </div>
  <div class="text-base pb-base">
    <strong>Strasse/Nr.</strong><br>
    {{ $data->street }}
  </div>
  <div class="text-base pb-base">
    <strong>PLZ/Ort</strong><br>
    {{ $data->location }}
  </div>
  <div class="text-base pb-base">
    <strong>E-Mail</strong><br>
    {{ $data->email }}
  </div>
  <div class="text-base pb-base">
    <strong>Telefon</strong><br>
    {{ $data->phone }}
  </div>
  <div class="text-base pb-base">
    <strong>Wohnung</strong><br>
    {{ $data->interest }}
  </div>
</x-mail::message>
