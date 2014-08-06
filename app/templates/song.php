<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $app->getName() ?></title>

    <?php $app->render('head.php') ?>
  </head>
  <body>
    <div class="container">
      <div class="inner">
        <h2>What should I listen to <strong><?php echo $day_header ?></strong>?</h2>
        <p>You should listen to <a href="<?php echo lastFm($song->artist, $song->name) ?>"><?php echo $song->name ?></a> by <a href="<?php echo lastFm($song->artist) ?>"><?php echo $song->artist ?></a>.</p>

        <iframe src="https://embed.spotify.com/?uri=spotify:track:<?php echo $song->spotify_id ?>" width="100%" height="80" frameborder="0" allowtransparency="true"></iframe>
      </div>
    </div>

    <?php $app->render('ribbon.php') ?>
  </body>
</html>

