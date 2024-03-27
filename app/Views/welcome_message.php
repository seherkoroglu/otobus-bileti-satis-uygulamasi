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
          <a class="nav-link active" aria-current="page" href="<?= site_url('/login'); ?>">Giriş Yap</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('/register'); ?>">Üye Ol</a>
        </li>
       
      </ul>
     
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"> ara...</button>
      </form>
    </div>
  </div>
</nav>
<div>
    <div class="container mt-5" style="padding-bottom: 70px">
        <div class="row">
           
            <div class="col-lg-6 mx-auto" style = "text-align:center">
                <h1> Umuttepe Turizm'in Sayısız fırsatlarından yararlanmak için şimdi giriş yapın!</h1>
                <br>
                <div class="form-group">
                    <a class = "btn btn-primary btn-block" type="submit"  href="<?= site_url('/login'); ?>" >Giriş Yap</a>
                </div>

                <br><br>

            </div>
        </div>
    </div>

    

<footer class="card text-center">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  </div>
  <div class="card-footer text-body-secondary">
    2 days ago
  </div>
</footer>
</body>
</html>