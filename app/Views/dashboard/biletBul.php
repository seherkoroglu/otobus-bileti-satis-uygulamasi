
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
       
      </ul>
      <form class="d-flex" role="search">
        <a class="btn btn-outline-success" type="submit" href="<?= site_url('/login'); ?>">Çıkış Yap</a>
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
    <p>Seçilen Sefer Numarası: <?= $selected_trip['tripID']; ?> | Seçilen Sefer Tipi <?= $selected_trip['tripType']; ?></p>
    <p>Kalkış Zamanı <?= $selected_trip['departureTime']; ?> | Varış Zamanı <?= $selected_trip['arrivalTime']; ?></p>
    <p>Kalkış Terminali: <?= $departureTerminal['terminalName']; ?> (<?= $departureTerminal['city']; ?> - <?= $departureTerminal['cityCode']; ?>, Peron: <?= $departureTerminal['peronLetter']; ?>) | Varış Terminali <?= $arrivalTerminal['terminalName']; ?> (<?= $arrivalTerminal['city']; ?> - <?= $arrivalTerminal['cityCode']; ?>, Peron: <?= $arrivalTerminal['peronLetter']; ?>)</p>
    <p>Otobüs Şirketi Numarası: <?= $selected_trip['busCompanyID']; ?> | Otobüsün Plakası: <?= $selected_trip['busPlate']; ?></p>
    
<?php else : ?>
    <p>Sefer Seçilmedi!</p>
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
          </div>
        </div>

        <div class="container">
        <div class="row"  style="justify-content: center"  >
            <div class="col-md-4 col-md-offset-4">

          <div class="form-group">
        <label for="numPassengers"></label>
        <input type="number" id="numPassengers" class="form-control" name="numPassengers" min="1" placeholder="yolcu sayısı giriniz" value="<?= old('numPassengers'); ?>">
          
        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'numPassengers') : '' ?></span>
    </div>


                <div class="form-group">
        <label for="genderPreference" class="ms-3"></label>
        <select id="genderPreference" name="genderPreference" class="form-control"  placeholder="cinsiyet seçiniz" value="<?= old('genderPreference'); ?>">
          
          <span class="text-danger"><?= isset($validation) ? display_error($validation, 'genderPreference') : '' ?></span>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
                </div>

              <div class="form-group">  
        <label for="age"></label>
        <input type="number" id="age" name="age" placeholder="yaşınızı giriniz" min="1" class="form-control" value="<?= old('age'); ?>">
          
          <span class="text-danger"><?= isset($validation) ? display_error($validation, 'age') : '' ?></span
    </div>

    <div class="form-group">

        <label for="discountType" class="ms-3"></label>
        <select id="discountType" name="discountType" class="form-control"  placeholder="İndirim tipi seçiniz" value="<?= old('discountType'); ?>">
          
          <span class="text-danger"><?= isset($validation) ? display_error($validation, 'discountType') : '' ?></span>
            <option value="Student">Student</option>
            <option value="Senior">Senior (65+)</option>
            <option value="Employee">Employee</option>
            <option value="Security">Security Forces</option>
        </select>
    </div>


       
        <form action="<?= base_url('seatController/reserveSeats') ?>" method="post">
        <?= csrf_field() ?>
                <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail') ?></div>
                <?php endif; ?>
                <?php if(!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
        <button type="submit" class="btn btn-success mt-1">Reserve Seats</button>
        </form>
        <form action="<?= base_url('odeme') ?>" method="post">
        <button type="submit" id="buyButton" class="btn btn-success mt-1">Buy Seats</button>
    </form>
    <p><a href="<?= base_url('payment') ?>" class="btn btn-primary mt-1">Hemen satın al</a></p>
</div>
</div>
</div>
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
                        var totalPrice = selectedSeats * 1000;
                    }
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const numPassengersInput = document.getElementById('numPassengers');
        const amountInput = document.getElementById('amount');

        numPassengersInput.addEventListener('input', function () {
            const numPassengers = parseInt(numPassengersInput.value);
            const seatPrice = 1000; // Koltuk başına fiyatı burada tanımlayın

            const totalPrice = numPassengers * seatPrice;

            // Ödeme miktarını amount alanına yaz
            amountInput.value = totalPrice;
        });
    });


</script>






<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<br><br><br>
    
    
<br><br><br>
<footer class="card text-center">
  <div class="card-header" >
    UmuttepeTurizm
  </div>
  <div class="card-body">
    <h5 class="card-title">Bize Ulaşın</h5>
    <div style="flex-direction: row">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16"> UmuttepeTurizm
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
  <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
</svg>
</div>
  </div>
  <div class="card-footer text-body-secondary" style= "flex-directiob: row">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle" viewBox="0 0 16 16">
  <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512"/>
</svg>
    copyright Busla
  </div>
</footer>

</body>
</html>
