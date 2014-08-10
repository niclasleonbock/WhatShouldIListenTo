<!DOCTYPE html>
<html>
  <head>
    <title>What should I listen to <?php echo isset($day_header) ? $day_header : $day ?>?</title>

    <?php $app->render('head.php') ?>
  </head>
  <body>
    <div class="container">
      <div class="inner">
        <h2>What should I listen to <strong><?php echo isset($day_header) ? $day_header : $day ?></strong>?</h2>
        <p>You should listen to <a href="<?php echo lastFm($song->artist, $song->name) ?>"><?php echo $song->name ?></a> by <a href="<?php echo lastFm($song->artist) ?>"><?php echo $song->artist ?></a>.</p>

        <iframe src="https://embed.spotify.com/?uri=spotify:track:<?php echo $song->spotify_id ?>" width="100%" height="80" frameborder="0" allowtransparency="true"></iframe>

        <br>

        <p><small>See <a href="<?php echo $app->urlFor('day', [ 'day' => $day ]) ?>">what else</a> you could listen to today.</small></p>

        <?php $app->render('footer.php') ?>
      </div>
    </div>

    <?php $app->render('ribbon.php') ?>
  </body>
</html>

