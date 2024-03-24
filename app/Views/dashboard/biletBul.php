
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .bus {
            display: flex;
            flex-wrap: wrap;
            max-width: 600px;
            margin: 0 auto;
        }

        .seat {
            width: 50px;
            height: 50px;
            border: 1px solid #ccc;
            margin: 5px;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
        }
   
        #map {
            height: 400px;
            width: 80%;
            margin: 0 auto;
        }
        .bus {
    width: 800px;
    margin: 50px auto;
    position: relative;
  }
  .seat {
    background-color: #ccc;
    width: 50px;
    height: 50px;
    margin: 10px;
    float: left;
    border-radius: 5px;
    text-align: center;
    line-height: 50px;
    font-weight: bold;
  }
  .clear {
    clear: both;
  }
  .male {
    background-color: blue;
}

.female {
    background-color: pink;
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
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
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
    <div class="card mb-3">
            <div class="card-body">
      <h1>Seyahat Bilgisi</h1>
      <?php if (!empty($selected_trip)) : ?>
    <p>Trip ID: <?= $selected_trip['tripID']; ?> | Trip Type: <?= $selected_trip['tripType']; ?></p>
    <p>Departure Time: <?= $selected_trip['departureTime']; ?> | Arrival Time: <?= $selected_trip['arrivalTime']; ?></p>
    <p>Departure Terminal: <?= $departureTerminal['terminalName']; ?> (<?= $departureTerminal['city']; ?> - <?= $departureTerminal['cityCode']; ?>, Peron: <?= $departureTerminal['peronLetter']; ?>) | Arrival Terminal: <?= $arrivalTerminal['terminalName']; ?> (<?= $arrivalTerminal['city']; ?> - <?= $arrivalTerminal['cityCode']; ?>, Peron: <?= $arrivalTerminal['peronLetter']; ?>)</p>
    <p>Bus Company ID: <?= $selected_trip['busCompanyID']; ?> | Bus Plate: <?= $selected_trip['busPlate']; ?></p>
    
<?php else : ?>
    <p>No trip selected!</p>
<?php endif; ?>
            </div>
    </div>
 
      </div>
    </div>
  </div>
</div>
<br><br><br>
<div id="map"></div>
    <script>
         function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7
            });
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer({
                map: map
            });

            var start = {lat: <?= $departureTerminal['latitude'] ?>, lng: <?= $departureTerminal['longitude'] ?>};
            var end = {lat: <?= $arrivalTerminal['latitude'] ?>, lng: <?= $arrivalTerminal['longitude'] ?>};

            var request = {
                origin: start,
                destination: end,
                travelMode: 'DRIVING'
            };

            directionsService.route(request, function(response, status) {
                if (status === 'OK') {
                    directionsRenderer.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDetN6rJRr6m5Ce84FLV8JWlG277RFX1BA&callback=initMap" async defer></script>

    <div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 mx-auto text-center">
            <h5>Bus Layout</h5>
            <div class="bus">
            <?php
            $seatNumber = 1;
            for ($row = 1; $row <= 4; $row++) {
              for ($column = $row; $column <= 32; $column += 4) {
                echo '<div class="seat';
                // Check the selected gender and add appropriate CSS class
                if (isset ($_POST['genderPreference'])) {
                  if ($_POST['genderPreference'] == 'Male') {
                    echo ' male';
                  } elseif ($_POST['genderPreference'] == 'Female') {
                    echo ' female';
                  }
                }
                echo '">' . $column . '</div>';
              }
              echo '<br>'; // Her satırın sonunda bir alt satıra geçmek için bir satır ekle
            }
            ?>
            
            </div>
            
            
            </div>
           
       
        <label for="numPassengers">yolcu sayısı:</label>
        <input type="number" id="numPassengers" name="numPassengers" min="1" value="1">
       
        <label for="genderPreference" class="ms-3">Gender:</label>
        <select id="genderPreference" name="genderPreference" >
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        
        <br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" min="1" value="1">
        <label for="discountType" class="ms-3">Discount Type:</label>
        <select id="discountType" name="discountType">
            <option value="Student">Student</option>
            <option value="Senior">Senior (65+)</option>
            <option value="Employee">Employee</option>
            <option value="Security">Security Forces</option>
        </select>
        <br><br>
        <form action="<?= base_url('seatController/reserveSeats') ?>" method="post">
        <button type="submit" class="btn btn-success mt-1">Reserve Seats</button>
        </form>
        <form action="<?= base_url('odeme') ?>" method="post">
        <button type="submit" id="buyButton" class="btn btn-success mt-1">Buy Seats</button>
    </form>
    <p><a href="<?= base_url('payment') ?>" class="btn btn-primary mt-1">Hemen satın al</a></p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const seats = document.querySelectorAll('.seat');
        const numPassengersInput = document.getElementById('numPassengers');
        let selectedSeats = [];
        let selectedGender = '';

        // Koltuklara tıklama olayını ekle
        seats.forEach(function (seat) {
            seat.addEventListener('click', function () {
                // Seçilen cinsiyeti ve yolcu sayısını al
                selectedGender = document.getElementById('genderPreference').value;
                const numPassengers = parseInt(numPassengersInput.value);

                // Koltuğun numarasını al
                const seatNumber = parseInt(seat.textContent);

                // Koltuğun rengini değiştir veya geri al
                if (selectedSeats.includes(seatNumber)) {
                    // Seçili koltukları geri al
                    seat.classList.remove(selectedGender.toLowerCase());
                    selectedSeats = selectedSeats.filter(num => num !== seatNumber);
                } else if (selectedSeats.length < numPassengers) {
                    // Yeterli koltuk seçilmediyse ve seçilen koltuk yeni ise rengini değiştir
                    // ve yan yana oturan farklı cinsiyetteki yolcuları kontrol et
                    if (!selectedSeats.length || !selectedSeats.find(selectedSeat => Math.abs(selectedSeat - seatNumber) === 1) ||
                        !selectedSeats.find(selectedSeat => {
                            const selectedSeatElement = document.querySelector(`.seat:nth-child(${selectedSeat})`);
                            const selectedSeatGender = selectedSeatElement.classList.contains('Male') ? 'Male' : 'Female';
                            return selectedSeatGender !== selectedGender.toLowerCase();
                        })) {
                        seat.classList.add(selectedGender.toLowerCase());
                        selectedSeats.push(seatNumber);
                    }
                }
            });
        });
    });
</script>







<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<br><br><br>
    
    
<br><br><br>
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
