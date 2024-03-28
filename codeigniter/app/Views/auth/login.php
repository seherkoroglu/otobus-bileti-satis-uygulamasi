<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css')?>">
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:45px;">
            <div class="col-md-4 col-md-offset-4">
                <h2>Umuttepe Turizm'e Hoşgeldiniz!</h2><hr>
                <h4>Fırsatlardan yararlanmak için şimdi giriş yapın!</h4><hr>
                <form action="<?= base_url('auth/check'); ?>"  method="post" autocomplete="off" >
                <?= csrf_field() ?>
                <?php if(!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail') ?></div>
                <?php endif; ?>
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email" value="<?= set_value('email')?>">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Şifre</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>

                </div>
                <div class="form-group">
                    <button class = "btn btn-primary btn-block" type="submit">Giriş Yap</button>
                </div>
                <br>
                <a href="<?= site_url('register'); ?>">Hesabın yok mu, Şimdi Üye Ol!</a>
                </form>
            </div>
        </div>
    </div>

    
</body>
</html>