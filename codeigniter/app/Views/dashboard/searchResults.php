<!-- <?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//                   // Formdan gelen verileri alıyoruz
//                   $inputFrom = $_POST['inputFrom'];
//                   $inputTo = $_POST['inputTo'];
//                   $inputDate = $_POST['inputDate'];
//                   $inputStatus = $_POST['inputStatus'];
              
//                   // Gerekli veritabanı bağlantısını yapalım
//                   $db = \Config\Database::connect();
              
//                   // Sorguyu oluşturalım, fakat dikkat edin, formdan gelen verileri sorguya doğrudan eklemiyoruz, bunun yerine prepared statement kullanmalıyız
//                   $query = $db->query(
//                     "SELECT s.tripID, s.tripType, s.departureTime, t.terminalName AS departureTerminal, t.city AS departureCity,
//                      t_arrival.terminalName AS arrivalTerminal, t_arrival.city AS arrivalCity, s.arrivalTime
//                   FROM seyahatlerTablosu AS s
//                   JOIN terminaller AS t ON s.departureTerminalID = t.terminalID
//                   JOIN terminaller AS t_arrival ON s.arrivalTerminalID = t_arrival.terminalID
//                   WHERE t.city = ? AND t_arrival.city = ? AND DATE(s.departureTime) = ? AND s.tripType = ?",
//                   array($inputFrom, $inputTo, $inputDate, $inputStatus)
//                   );
              
              
//                   $results = $query->getResultArray();
          
//                   // Sonuçları döngü ile yazdıralım
//                   foreach ($results as $row) {
//                       echo "Seyahat ID: " . $row->tripID . "<br>";
//                       echo "Seyahat Türü: " . $row->tripType . "<br>";
//                       echo "Kalkış Terminali: " . $row->departureTerminal . " (" . $row->departureCity . ")" . "<br>";
//                       echo "Varış Terminali: " . $row->arrivalTerminal . " (" . $row->arrivalCity . ")" . "<br>";
//                       echo "Kalkış Saati: " . $row->departureTime . "<br>";
//                       echo "Varış Saati: " . $row->arrivalTime . "<br>";
//                       echo "<br>";
//                   }
//               }
              ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .seat {
        width: 40px;
        height: 40px;
        margin: 5px;
        display: inline-block;
        border-radius: 5px;
        cursor: pointer;
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">UmuttepeTurizm</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= site_url('/dashboard'); ?>">Anasayfa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Biletlerim</a>
        </li>
      
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"> ara...</button>
      </form>
    </div>
  </div>
</nav>
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <h2 class="mb-4">Bus Reservation</h2>
      <?php if (empty($seyahatler)): ?>
        <div class="alert alert-danger">No trips found</div>
        <?php else: ?>  
            <div class="card mb-3">
            <div class="card-body">
               
      <?php  foreach ( $seyahatler as $seyahat) { ?>
        <h5 class="card-title
                ">Select a Bus Trip</h5>
                <form action="<?= base_url('bilet/biletBul'); ?>" method="post">
                    <input type="hidden" name="tripID" value="<?= $seyahat['tripID']; ?>">
                    <p>Trip ID: <?=$seyahat['tripID']; ?> | Trip Type: <?= $seyahat['tripType']; ?></p>
                    <p>Departure Terminal: <?= $seyahat['departureTerminal']; ?> (<?= $seyahat['departureCity']; ?>) | Arrival Terminal: <?= $seyahat['arrivalTerminal']; ?> (<?= $seyahat['arrivalCity']; ?>)</p>
                    <p>Departure Time: <?= $seyahat['departureTime']; ?> | Arrival Time: <?= $seyahat['arrivalTime']; ?> </p>
                    <button type="submit" class="btn btn-primary">Select Trip</button>
                    <br><br>
                </form>
        <?php } ?>
        <?php endif; ?>
            </div>
        </div>
    </div>
  </div>
</div>


<div class="card text-center">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-body-secondary">
    2 days ago
  </div>
</div>

</body>
</html>

