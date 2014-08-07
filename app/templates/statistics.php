<!DOCTYPE html>
<html>
  <head>
    <title>Statistics</title>

    <?php $app->render('head.php') ?>

    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.5.1.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.5.1.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="inner">
        <h2>Statistics</h2>
        <p>We have a total of <strong><?php echo $total ?> songs</strong>, which means an average of <strong><?php echo round($total / count(weekdays())) ?> songs</strong> for every day of the week.</p>

        <hr>

        <div class="units-row">
	      <div class="unit-50">
            <div id="distribution" style="height: 300px;"></div>
          </div>

          <div class="unit-50">
            <nav class="nav">
              <ul>
                  <?php foreach ($days as $day => $values) : ?>
                    <li><a href="<?php echo $app->urlFor('day', [ 'day' => weekday($day) ]) ?>">We have <?php echo $values['count'] ?> songs for <?php echo weekday($day) ?></a></li>
                  <?php endforeach ?>
              </ul>
            </nav>
          </div>
        </div>

        <?php $app->render('footer.php') ?>
      </div>
    </div>

    <?php $app->render('ribbon.php') ?>

    <script>
      new Morris.Donut({

        element: 'distribution',
        data: [
          <?php foreach ($days as $day => $values) : ?>
          { label: '<?php echo ucfirst(weekday($day)) ?>', value: '<?php echo $values['count'] ?>' },
          <?php endforeach ?>
        ],
        colors: [
          '#1abc9c', '#16a085', '#27ae60', '#2ecc71', '#34495e', '#3498db', '#2980b9',
        ],
      });
    </script>
  </body>
</html>

