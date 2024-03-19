
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
          <a class="nav-link active" aria-current="page" href="#">Anasayfa</a>
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
      <h2 class="mb-4">Bus Reservation</h2>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Select a Bus Trip</h5>
          <p>Departure Time: 09:00 | Arrival Time: 14:00 | Duration: 5 hours</p>
          <p>Bus Name: ABC Bus | Seat Type: Single Row</p>
          <p>Fare: $20</p>
          <button id="selectTripButton" class="btn btn-primary">Select Trip</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-8 mx-auto text-center">
      <h5>Bus Layout</h5>
      <div id="seatsContainer" class="mt-3"></div>
      <div class="mt-3">
        <label for="numPassengers">Number of Passengers:</label>
        <input type="number" id="numPassengers" min="1" value="1">
        <label for="genderSelect" class="ms-3">Gender:</label>
        <select id="genderSelect">
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
        <button id="reserveButton" class="btn btn-success mt-1" style="margin-left: 10px;">Reserve Seats</button>
      </div>
    </div>
  </div>
</div>
<div id="map" class="container mt-5 d-none" style="height: 400px;"></div>

<script>
  // Function to display Google Map with route
  function showRouteOnMap() {
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 6,
      center: { lat: 41.85, lng: -87.65 } // Default center (Chicago)
    });
    directionsRenderer.setMap(map);
    const request = {
      origin: "Chicago, IL",
      destination: "Los Angeles, CA",
      travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function(result, status) {
      if (status === "OK") {
        directionsRenderer.setDirections(result);
      }
    });
    document.getElementById("map").classList.remove("d-none");
  }

  // Event listener to handle trip selection
  document.getElementById("selectTripButton").addEventListener("click", function() {
    showRouteOnMap();
  });

  // Event listener to handle reservation
  document.getElementById("reserveButton").addEventListener("click", function() {
    showRouteOnMap();
  });
</script>

<!-- Load Google Maps JavaScript API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDetN6rJRr6m5Ce84FLV8JWlG277RFX1BA&callback=initMap" async defer></script>

<br>
<script>
  // Dummy seat data, 0: Available, 1: Reserved, 2: Booked
  const seatData = [
    [0, 1, 0, 0, 1, 0, 0,2 , 0, 0],
    [0, 0, 0, 0, 0, 0, 1, 0, 0, 0],
    [1, 0, 1, 0, 0, 0, 0, 0, 0, 0],
   
  ];

  // Function to display bus layout
  function showBusLayout() {
    const seatsContainer = document.getElementById("seatsContainer");
    seatsContainer.innerHTML = "";
    seatData.forEach((row, rowIndex) => {
      const rowElement = document.createElement("div");
      rowElement.className = "mb-3";
      row.forEach((seat, seatIndex) => {
        const seatElement = document.createElement("div");
        seatElement.className = "seat";
        if (seat === 0) {
          seatElement.style.backgroundColor = "green";
          seatElement.title = "Available";
        } else if (seat === 1) {
          seatElement.style.backgroundColor = "blue";
          seatElement.title = "Reserved";
        } else {
          seatElement.style.backgroundColor = "red";
          seatElement.title = "Booked";
        }
        seatElement.dataset.row = rowIndex;
        seatElement.dataset.seat = seatIndex;
        seatElement.addEventListener("click", function() {
          if (this.style.backgroundColor === "green") {
            this.style.backgroundColor = "yellow";
          } else if (this.style.backgroundColor === "yellow") {
            this.style.backgroundColor = "green";
          }
        });
        rowElement.appendChild(seatElement);
      });
      seatsContainer.appendChild(rowElement);
    });
    document.getElementById("busLayout").classList.remove("d-none");
  }

  // Event listener to handle trip selection
  document.getElementById("selectTripButton").addEventListener("click", function() {
    showBusLayout();
  });

  // Event listener to handle reservation
  document.getElementById("reserveButton").addEventListener("click", function() {
    const numPassengers = document.getElementById("numPassengers").value;
    const gender = document.getElementById("genderSelect").value;
    const selectedSeats = document.querySelectorAll(".seat[style='background-color: yellow;']");
    if (selectedSeats.length === numPassengers) {
      selectedSeats.forEach(seat => {
        seat.style.backgroundColor = gender === "male" ? "blue" : "red";
        seat.title = "Reserved";
      });
      alert("Seats reserved successfully!");
    } else {
      alert("Please select the correct number of seats.");
    }
  });
</script>
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
