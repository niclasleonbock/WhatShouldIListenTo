<!DOCTYPE html>
<html>
  <head>
    <title>About</title>

    <?php $app->render('head.php') ?>
  </head>
  <body>
    <div class="container">
      <div class="inner">
        <h2>About</h2>
        <p>WSILT is a service with the purpose of telling you to what you could listen to based on the current (<code>/today</code>) or a given weekday (<code>/on/:day</code>, where <code>:day</code> needs to be replaced by the weekday, e.g. <code>/on/monday</code>). It uses Spotify to directly link to the according songs.</p>
        <p>For a full list of all songs you could listen to there is <code>/songs/for/:day</code> (e.g. <code>/songs/for/today</code> or <code>/songs/for/monday</code>).</p>
        <p>You think WSILT is missing a specific song? No problem! You can contribute to the song database! Click <a href="https://github.com/niclasleonbock/wsilt-days">here</a> for more information.</p>
        <p>WSILT is an open source project. You can help improve it by contributing on <a href="https://github.com/niclasleonbock/WhatShouldIListenTo">GitHub</a>.</p>

        <hr>

        <h3>List of Links</h3>

        <div class="units-row">
	      <div class="unit-50">
            <nav class="nav nav-stacked">
              <ul>
                  <li><a href="<?php echo $app->urlFor('today') ?>">What should I listen to today?</a></li>

                  <?php foreach (weekdays() as $day) : ?>
                    <li><a href="<?php echo $app->urlFor('on', [ 'day' => $day ]) ?>">What should I listen to on <?php echo $day ?>?</a></li>
                  <?php endforeach ?>
              </ul>
            </nav>
          </div>

          <div class="unit-50">
            <nav class="nav nav-stacked">
              <ul>
                  <li><a href="<?php echo $app->urlFor('day', [ 'day' => 'today' ]) ?>">All songs for today</a></li>

                  <?php foreach (weekdays() as $day) : ?>
                    <li><a href="<?php echo $app->urlFor('day', [ 'day' => $day ]) ?>">All songs for <?php echo $day ?></a></li>
                  <?php endforeach ?>
              </ul>
            </nav>
          </div>
        </div>

        <?php $app->render('footer.php') ?>
      </div>
    </div>

    <?php $app->render('ribbon.php') ?>
  </body>
</html>

