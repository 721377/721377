<?php
include 'sidebar.php';
include 'head.php';
include 'dbcon.php';




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/stati.css">
  <title>Document</title>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>

<body>


  <section class="command">
    <div class="grid-command">

      <div class="stati">
        <canvas id="myChart"></canvas>
      </div>

      <div class="top-card">
        <div class="card user">
          <div class="icon">
            <img src="images/5440339.png" alt="">
          </div>
          <div class="num">12<span>users</span></div>

          <div class="button">
            <a href="">see all</a>
          </div>
        </div>
        <div class="card user">
          <div class="icon">
            <img src="images/3080950.png" alt="">
          </div>
          <div class="num">12<span>order</span></div>

          <div class="button">
            <a href="">see all</a>
          </div>
        </div>
        <div class="card user">
          <div class="icon">
            <img src="images/5440339.png" alt="">
          </div>
          <div class="num">12<span>plats</span></div>

          <div class="button">
            <a href="">see all</a>
          </div>
        </div>
      </div>



    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </section>

  <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1,
          borderColor: '#fe9000',
          backgroundColor: '#ff882d'
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>

</body>

</html>