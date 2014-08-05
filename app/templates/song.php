<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $app->getName() ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:600,300">

    <link rel="stylesheet" href="<?php echo $asset_path ?>css/kube.min.css">
    <link rel="stylesheet" href="<?php echo $asset_path ?>css/app.css">
    <link rel="stylesheet" href="<?php echo $asset_path ?>css/gh-fork-ribbon.css">
  </head>
  <body>
    <div class="container">
      <div class="inner">
        <h2>What should I listen to <strong><?php echo $day_header ?></strong>?</h2>
        <p>You should listen to <a href="<?php echo lastFm($song->artist, $song->name) ?>"><?php echo $song->name ?></a> by <a href="<?php echo lastFm($song->artist) ?>"><?php echo $song->artist ?></a>.</p>

        <iframe src="https://embed.spotify.com/?uri=spotify:track:<?php echo $song->spotify_id ?>" width="100%" height="80" frameborder="0" allowtransparency="true"></iframe>
      </div>
    </div>

    <div class="github-fork-ribbon-wrapper left">
      <div class="github-fork-ribbon">
        <a href="https://github.com/niclasleonbock/wsilt-days">Add a Song</a>
      </div>
    </div>

    <div class="github-fork-ribbon-wrapper right">
      <div class="github-fork-ribbon">
        <a href="https://github.com/niclasleonbock/WhatShouldIListenTo">Fork me on GitHub</a>
      </div>
    </div>
  </body>
</html>

