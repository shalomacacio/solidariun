<!DOCTYPE html>

<html lang="en">
@include('partials.head')
  <body>
    @include('partials.nav')
      @include('partials.banner')
      @include('partials.recentes')
      {{-- @include('partials.atuantes') --}}
      @include('partials.testemunhos')
    @include('partials.footer')
    @include('partials.scripts')
  </body>
</html>
