<!DOCTYPE html>
<html>
  <head>
    <title>Error</title>

    <?php $app->render('head.php') ?>
  </head>
  <body>
    <div class="container">
      <div class="inner">
        <h2>Whoops! Looks like something went wrong.</h2>
        <p>Why don't you just look up what song you could <a href="<?php echo $app->urlFor('today') ?>">listen to today?</a></p>

        <?php $app->render('footer.php') ?>
      </div>
    </div>

    <?php $app->render('ribbon.php') ?>
  </body>
</html>

