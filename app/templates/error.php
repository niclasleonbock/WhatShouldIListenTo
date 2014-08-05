<!DOCTYPE html>
<html>
  <head>
    <title>Error</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:600,300">

    <link rel="stylesheet" href="<?php echo $asset_path ?>css/kube.min.css">
    <link rel="stylesheet" href="<?php echo $asset_path ?>css/app.css">
  </head>
  <body>
    <div class="container">
      <div class="inner">
        <h2>Whoops! Looks like something went wrong.</h2>
        <p>Why don't you just look up what song you could <a href="<?php echo $app->urlFor('today') ?>">listen to today?</a></p>
      </div>
    </div>
  </body>
</html>

