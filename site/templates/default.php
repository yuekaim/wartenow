<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <?php snippet('meta'); ?>

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
