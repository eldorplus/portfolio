<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="mobile-web-app-capable" content="yes">

      <meta name="theme-color" content="#282828">
      <meta name="msapplication-navbutton-color" content="#282828">

      <meta name="description" content="{{ config('app.tagline') }}">
      <meta name="author" content="Patrick LUZOLO">
      <meta name="designer" content="Patrick LUZOLO">

      <link rel="manifest" href="{{ App::staticUrl('public/manifest.json') }}" />
      <meta name="msapplication-config" content="{{ App::staticUrl('public/browserconfig.xml') }}" />
      <link rel="icon" type="image/x-icon" href="{{ App::staticUrl('public/favicon.ico') }}" />
      <link rel="icon" href="{{ App::staticUrl('public/images/icon.png') }}">
      <link rel="apple-touch-icon" href="{{ App::staticUrl('public/images/icon.png') }}">
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Rubik:300,500" rel="stylesheet">
      <link rel="stylesheet" href="{{ App::rev('/css/app.css') }}">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.tagline', 'Patrick LUZOLO, Administrateur Système, Réseaux & Sécurité / Développeur Web') }}</title>
      <!-- Scripts -->
      <script type="text/javascript">
          window.App = {!! json_encode([
              'csrfToken' => csrf_token(),
          ]) !!};
      </script>
  </head>
  <body>
    <div id="app"></div>
    <noscript>It may sound funny, but My Portfolio requires JavaScript to sing. Please enable it.</noscript>
    <!-- Scripts -->
    <script src="{{ App::rev('/js/app.js') }}" type="text/javascript"></script>
  </body>
</html>
