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
        <p><?php echo ucfirst($day_header) ?> you should listen to one of these <?php echo count($songs) ?> songs.</p>

        <hr>

        <?php foreach ($songs as $song) : ?>
          <div class="units-row">
	        <div class="unit-33">
                <a href="<?php echo lastFm($song->artist, $song->name) ?>"><?php echo $song->name ?></a><br>by <a href="<?php echo lastFm($song->artist) ?>"><?php echo $song->artist ?></a>
            </div>

	        <div class="unit-66">
              <iframe src="https://embed.spotify.com/?uri=spotify:track:<?php echo $song->spotify_id ?>" width="100%" height="80" frameborder="0" allowtransparency="true"></iframe>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>

    <?php $app->render('ribbon.php') ?>
  </body>
</html>

