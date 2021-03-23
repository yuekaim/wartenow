<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <?php snippet('meta'); ?>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;900&family=Space+Mono&display=swap" rel="stylesheet">

  <?= css('assets/frontend/build/bundle.css') ?>

  <?php snippet('favicon'); ?>
  <?php snippet('jsonld'); ?>

  <script>
    window.siteData = <?= json_encode( $site->json() ) ?>;
  </script>

</head>
<!-- This website was made by Kim, Cleo and Moritz at HFBK Hamburg Klasse Digitale Grafik -->
<body>
  <?= js('assets/frontend/build/bundle.js') ?>
</body>
</html>
