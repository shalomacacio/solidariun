<head>
     @stack('headers')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solidariun</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('partials.styles')

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
