<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
  

    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
          <a class="nav-link active" aria-current="page" href="#">Anasayfa</a>
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
    <div class="col-lg-6 mx-auto">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">BİLET BUL</h5>
          <form action="<?= base_url('bilet/biletAra'); ?>" method="post">
            <div class="mb-3">
              <label for="inputFrom" class="form-label">NEREDEN</label>
              <input type="text" class="form-control" id="inputFrom" name="inputFrom" placeholder="Enter departure city" required>
            </div>
            <div class="mb-3">
              <label for="inputTo" class="form-label">NEREYE</label>
              <input type="text" class="form-control" id="inputTo"  name="inputTo" placeholder="Enter destination city" required>
            </div>
            <div class="mb-3">
              <label for="inputDate" class="form-label">TARİH</label>
              <input type="date" class="form-control" id="inputDate"  name="inputDate">
            </div>
            <div class="mb-3">
    <label for="inputStatus" class="form-label">DURUM</label>
    <select class="form-select" id="inputStatus"  name="inputStatus">
        <option value="OneWay">Tek Yön</option>
        <option value="RoundTrip">Gidiş Dönüş</option>
    </select>
</div>

<button type="submit" class="btn btn-primary" >Bilet Ara</button>

          </form>
           <?php
              // $db = \Config\Database::connect();

              // $query = $db->query("
              //     SELECT st.tripID, st.tripType, st.departureTime, st.busPlate
              //     FROM seyahatlertablosu st
              //     JOIN terminaller dep_terminal ON st.departureTerminalID = dep_terminal.terminalID
              //     JOIN terminaller arr_terminal ON st.arrivalTerminalID = arr_terminal.terminalID
              //     WHERE dep_terminal.city = 'İstanbul' AND arr_terminal.city = 'İzmir' AND st.tripType = 'One Way' AND st.busPlate = '41BSM3406'
              // ");
          
              // $results = $query->getResultArray();
          
           
          
              // foreach ($results as $row) {
              //     echo "Seyahat ID: " . $row['tripID'] . "<br>";
              //     echo "Seyahat Türü: " . $row['tripType'] . "<br>";
              //     echo "Bilet Tipi: " . $inputStatus . "<br>"; // Bilet tipi burada ekleniyo
              //     echo "Otobüs Plakası: " . $row['busPlate'] . "<br>";
              // }
          
          
    

          
              // // Form butonuna tıklanıp tıklanmadığını kontrol edelim
              // if ($_SERVER["REQUEST_METHOD"] == "POST") {
              //     // Formdan gelen verileri alıyoruz
              //     $inputFrom = $_POST['inputFrom'];
              //     $inputTo = $_POST['inputTo'];
              //     $inputDate = $_POST['inputDate'];
              //     $inputStatus = $_POST['inputStatus'];
              
              //     // Gerekli veritabanı bağlantısını yapalım
          //    $db = \Config\Database::connect();
              
          //     //     // Sorguyu oluşturalım, fakat dikkat edin, formdan gelen verileri sorguya doğrudan eklemiyoruz, bunun yerine prepared statement kullanmalıyız
          //     $query = $db->query("
          //     SELECT s.tripID, s.tripType, s.departureTime, t.terminalName AS departureTerminal, t.city AS departureCity,
          //     t_arrival.terminalName AS arrivalTerminal, t_arrival.city AS arrivalCity, s.arrivalTime
          //  FROM seyahatlerTablosu AS s
          //  JOIN terminaller AS t ON s.departureTerminalID = t.terminalID
          //  JOIN terminaller AS t_arrival ON s.arrivalTerminalID = t_arrival.terminalID;
           
          //  ");
           
          //  $results = $query->getResult();
           
          //  foreach ($results as $row) {
          //      echo "Seyahat ID: " . $row->tripID . "<br>";
          //      echo "Seyahat Türü: " . $row->tripType . "<br>";
          //      echo "Kalkış Terminali: " . $row->departureTerminal . " (" . $row->departureCity . ")" . "<br>";
          //      echo "Varış Terminali: " . $row->arrivalTerminal . " (" . $row->arrivalCity . ")" . "<br>";
          //      echo "Kalkış Saati: " . $row->departureTime . "<br>";
          //      echo "Varış Saati: " . $row->arrivalTime . "<br>";
          //      echo "<br>";
             
          //  }
           
   
              


?>
        


        </div>
      </div>
    </div>
  </div>
</div>
<br>
    
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