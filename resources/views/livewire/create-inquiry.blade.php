<form wire:submit="save" class="mt-16 lg:mt-24">
  @if (session()->has('status'))
    <div x-data="{ open: true }" x-show="open">
      <div class="bg-green-600 text-white font-semi font-normal py-10 px-15 pr-25 fixed top-10 left-10 inline-block w-auto z-[101]">
        <div class="relative">
          <a href="javascript:;" x-on:click="open = false">
            Vielen Dank, wir haben Ihre Anfrage erhalten.
            <x-icons.cross class="!w-15 !h-15 absolute -top-5 -right-20" />
          </a>
        </div>
      </div>
    </div>
  @endif

  <div class="mt-24 mb-16 lg:mb-20">
    <p><strong>Ich interessiere mich für folgenden Gewerberaum (bitte auswählen):</strong></p>
  </div>
  <x-layout.grid class="sm:gap-y-16 lg:gap-x-24 lg:gap-y-16">
    <x-honeypot />
    <x-layout.span class="relative">
      <strong class="flex mb-4">
        Austrasse 46
        @error('interest')
          <x-form.error 
            message="mind. 1 Option auswählen"
            class="relative right-auto left-10 h-24 mb-6 top-2"
            />
        @enderror
      </strong>
      <div class="flex">
        <div class="flex items-start">
          <x-form.checkbox name="interest" value="Austrasse 46, 76.3m2" isWire="true" class="mt-2 lg:mt-3" id="interest-763" />
          <x-form.checkbox-label for="interest-763">76.3 m<sup>2</sup></x-form.checkbox-label>
        </div>
        <div class="flex items-start ml-20">
          <x-form.checkbox name="interest" value="Austrasse 46, 58.8m2" isWire="true" class="mt-2 lg:mt-3" id="interest-588" />
          <x-form.checkbox-label for="interest-588">58.8 m<sup>2</sup></x-form.checkbox-label>
        </div>
        <div class="flex items-start ml-20">
          <x-form.checkbox name="interest" value="Austrasse 46, 105.2m2" isWire="true" class="mt-2 lg:mt-3" id="interest-1052" />
          <x-form.checkbox-label for="interest-1052">105.2 m<sup>2</sup></x-form.checkbox-label>
        </div>
      </div>
    </x-layout.span>

    <x-layout.span class="relative">
      <strong class="flex mb-4">
        Austrasse 48
        @error('interest')
          <x-form.error 
            message="mind. 1 Option auswählen"
            class="relative right-auto left-10 h-24 mb-4 top-2"
            />
        @enderror
      </strong>
      <div class="flex">
        <div class="flex items-start">
          <x-form.checkbox name="interest" value="Austrasse 48, 76.7m2" isWire="true" class="mt-2 lg:mt-3" id="interest-767" />
          <x-form.checkbox-label for="interest-767">76.7 m<sup>2</sup></x-form.checkbox-label>
        </div>
        <div class="flex items-start ml-20">
          <x-form.checkbox name="interest" value="Austrasse 48, 58.6m2" isWire="true" class="mt-2 lg:mt-3" id="interest-586" />
          <x-form.checkbox-label for="interest-586">58.6 m<sup>2</sup></x-form.checkbox-label>
        </div>
        <div class="flex items-start ml-20">
          <x-form.checkbox name="interest" value="Austrasse 48, 90.5m2" isWire="true" class="mt-2 lg:mt-3" id="interest-905" />
          <x-form.checkbox-label for="interest-905">90.5 m<sup>2</sup></x-form.checkbox-label>
        </div>
      </div>
    </x-layout.span>

    <x-layout.span class="relative">
      <x-form.input name="firstname" placeholder="Vorname*" isWire="true" />
      @error('firstname')
        <x-form.error message="{{ $message }}" />
      @enderror 
    </x-layout.span>
    <x-layout.span class="relative">
      <x-form.input name="name" placeholder="Name*" isWire="true" />
      @error('name')
        <x-form.error message="{{ $message }}" />
      @enderror 
    </x-layout.span>
    <x-layout.span class="relative">
      <x-form.input name="street" placeholder="Strasse/Nr.*" isWire="true" />
      @error('street')
        <x-form.error message="{{ $message }}" />
      @enderror 
    </x-layout.span>
    <x-layout.span class="relative">
      <x-form.input name="location" placeholder="PLZ/Ort*" isWire="true" />
      @error('location')
        <x-form.error message="{{ $message }}" />
      @enderror 
    </x-layout.span>
    <x-layout.span class="relative">
      <x-form.input name="email" type="email" placeholder="E-Mail*" isWire="true" />
      @error('email')
        <x-form.error message="{{ $message }}" />
      @enderror 
    </x-layout.span>
    <x-layout.span class="relative">
      <x-form.input name="phone" placeholder="Telefon" isWire="true" />
      @error('phone')
        <x-form.error message="{{ $message }}" />
      @enderror 
    </x-layout.span>
    <x-layout.span>
      <x-form.textarea name="message" placeholder="Nachricht" isWire="true" />
    </x-layout.span>
    <x-layout.span class="relative sm:!col-span-12">
      @error('privacy')
        <x-form.error 
          message="Datenschutzerklärung muss akzeptiert werden"
          class="relative right-auto left-0 mb-6"
          />
      @enderror
      <div class="flex items-start">
        <x-form.checkbox name="privacy" id="privacy" isWire="true" class="mt-2 lg:mt-3" />
        <x-form.checkbox-label for="privacy">
          Ich habe die <a href="{{ route('page.privacy') }}" title="Datenschutzerklärung" target="_blank" class="hover:underline underline-offset-2 decoration-1">Datenschutzerklärung</a> gelesen und akzeptiere diese
        </x-form.checkbox-label>
      </div>
    </x-layout.span>
    <x-layout.span class="sm:col-span-12 mt-15">
      <x-form.button>
        <div wire:loading>
          <x-form.spinner class="mr-12 text-olive" />
        </div>
        Senden
      </x-form.button>
    </x-layout.span>
  </x-layout.grid>
</form>
