<!DOCTYPE html>
<html>
  <head>
    <title>Statistics</title>

    <?php $app->render('head.php') ?>

    <script src="<?php echo $asset_path ?>js/Chart.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="inner">
        <h2>Statistics</h2>
        <p>We have a total of <strong><?php echo $total ?> songs</strong>, which means an average of <strong><?php echo round($total / count(weekdays())) ?> songs</strong> for every day of the week.</p>

        <hr>

        <div class="units-row">
	      <div class="unit-50">
            <canvas id="distribution" height="300"></canvas>
          </div>

          <div class="unit-50">
            <nav class="nav">
              <ul>
                  <?php foreach ($days as $rank => $day) : ?>
                    <li><a href="<?php echo $app->urlFor('day', [ 'day' => $day['name'] ]) ?>">We have <?php echo $day['count'] ?> songs for <?php echo $day['name'] ?></a></li>
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
        new Chart(document.getElementById("distribution"), {
            type: 'polarArea',
            data: {
                labels: [<?php foreach ($days as $rank => $day) { echo '"' . ucfirst($day['name']) . '",'; } ?>],
                datasets: [
                    {
                        label: "Songs",
                        backgroundColor: [
                            "#FF6384",
                            "#4BC0C0",
                            "#FFCE56",
                            "#7f8c8d",
                            "#36A2EB",
                            "#9b59b6",
                            "#e74c3c",
                        ],
                        data: [<?php foreach ($days as $rank => $day) { echo $day['count'] . ','; } ?>],
                    },
                ],
            },
        });
    </script>
  </body>
</html>

