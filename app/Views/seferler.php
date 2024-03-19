<!DOCTYPE html>
<html lang="tr">
<head>
    <?php include('./admin/head.php') ?>
    <title>Seferler</title>
</head>
<body>
    <style>
        body{margin-top:20px;
    background:#eee;
    }
    
    .member-entry {
      border: 1px solid #ebebeb;
      padding: 15px;
      margin-top: 15px;
      margin-bottom: 30px;
      -moz-box-shadow:  0 1.5rem 4rem rgba(22, 28, 45, 0.1);
      -webkit-box-shadow:  0 1.5rem 4rem rgba(22, 28, 45, 0.1);
      box-shadow: 1 0 1.5rem 4rem rgba(22, 28, 45, 0.1);
      -moz-transition: all 300ms ease-in-out;
      -webkit-transition: all 300ms ease-in-out;
      -o-transition: all 300ms ease-in-out;
      transition: all 300ms ease-in-out;
      -webkit-border-radius: 3px;
      -webkit-background-clip: padding-box;
      -moz-border-radius: 3px;
      -moz-background-clip: padding;
      border-radius: 3px;
      background-clip: padding-box;
      background:#fff;
        -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
    }
    .member-entry:before,
    .member-entry:after {
      content: " ";
      display: table;
    }
    .member-entry:after {
      clear: both;
    }
    .member-entry:hover {
      background: rgba(235, 235, 235, 0.3);
      -moz-box-shadow: 1px 1px 1px rgba(0, 1, 1, 0.06);
      -webkit-box-shadow: 1px 1px 1px rgba(0, 1, 1, 0.06);
      box-shadow: 1px 1px 1px rgba(0, 1, 1, 0.06);
    }
    .member-entry .member-img,
    .member-entry .member-details {
      float: left;
    }
    .member-entry .member-img {
      position: relative;
      display: block;
      width: 10%;
    }
    .member-entry .member-img img {
      width: 100%;
      display: block;
      max-width: 100%;
      height: auto;
    }
    .member-entry .member-img i {
      position: absolute;
      display: block;
      left: 50%;
      top: 50%;
      margin-top: -12.5px;
      margin-left: -12.5px;
      color: #FFF;
      font-size: 25px;
      zoom: 1;
      -webkit-opacity: 0;
      -moz-opacity: 0;
      opacity: 0;
      filter: alpha(opacity=0);
      -moz-transform: scale(0.5);
      -webkit-transform: scale(0.5);
      -ms-transform: scale(0.5);
      -o-transform: scale(0.5);
      transform: scale(0.5);
      -moz-transition: all 300ms ease-in-out;
      -webkit-transition: all 300ms ease-in-out;
      -o-transition: all 300ms ease-in-out;
      transition: all 300ms ease-in-out;
    }
    .member-entry .member-img:hover i {
      -moz-transform: scale(1);
      -webkit-transform: scale(1);
      -ms-transform: scale(1);
      -o-transform: scale(1);
      transform: scale(1);
      zoom: 1;
      -webkit-opacity: 1;
      -moz-opacity: 1;
      opacity: 1;
      filter: alpha(opacity=100);
    }
    .member-entry .member-details {
      width: 89.9%;
    }
    .member-entry .member-details h4 {
      font-size: 18px;
      margin-left: 20px;
    }
    .member-entry .member-details h4 a {
      -moz-transition: all 300ms ease-in-out;
      -webkit-transition: all 300ms ease-in-out;
      -o-transition: all 300ms ease-in-out;
      transition: all 300ms ease-in-out;
    }
    .member-entry .member-details .info-list {
      margin-left: 5px;
    }
    .member-entry .member-details .info-list > div {
      margin-top: 5px;
      font-size: 13px;
    }
    .member-entry .member-details .info-list > div a {
      -moz-transition: all 300ms ease-in-out;
      -webkit-transition: all 300ms ease-in-out;
      -o-transition: all 300ms ease-in-out;
      transition: all 300ms ease-in-out;
    }
    .member-entry .member-details .info-list > div i {
      -moz-transition: all 300ms ease-in-out;
      -webkit-transition: all 300ms ease-in-out;
      -o-transition: all 300ms ease-in-out;
      transition: all 300ms ease-in-out;
    }
    .member-entry .member-details .info-list > div:hover i {
      color: #4f5259;
    }
    @media screen and (max-width: 768px) {
      .member-entry .member-img {
        width: 18%;
      }
      .member-entry .member-details {
        width: 81.9%;
      }
      .member-entry .member-details h4 {
        margin-top: 0;
      }
    }
    @media screen and (max-width: 480px) {
      .member-entry .member-img {
        width: 100%;
        float: none;
        text-align: center;
        position: relative;
        background: #f8f8f8;
        margin-bottom: 15px;
        -webkit-border-radius: 3px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 3px;
        -moz-background-clip: padding;
        border-radius: 3px;
        background-clip: padding-box;
      }
      .member-entry .member-img img {
        width: auto;
        display: inline-block;
        -webkit-border-radius: 0;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 0;
        -moz-background-clip: padding;
        border-radius: 0;
        background-clip: padding-box;
      }
      .member-entry .member-details {
        width: 100%;
        float: none;
      }
      .member-entry .member-details h4,
      .member-entry .member-details .info-list {
        margin-left: 0;
      }
      .member-entry .member-details h4 > div,
      .member-entry .member-details .info-list > div {
        padding: 0;
      }
      .member-entry .member-details .info-list > div {
        margin-top: 10px;
      }
    }
    </style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row bootstrap snippets bootdeys"> 
    <div class="col-md-9 col-sm-7"> 
        <h2>Members</h2> 
    </div> 
    <div class="col-md-3 col-sm-5"> 
        <form method="get" role="form" class="search-form-full"> 
            <div class="form-group"> 
                <input type="text" class="form-control" name="s" id="search-input" placeholder="Search..."> 
                <i class="entypo-search"></i> 
            </div> 
        </form> 
    </div> 
</div>
<div class="member-entry"> 
    <a href="#" class="member-img"> 
        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-rounded"> 
        <i class="fa fa-forward"></i> 
    </a> 
    <div class="member-details"> 
        <h4> <a href="#">Johnnie Linton</a> </h4> 
        <div class="row info-list"> 
            <div class="col-sm-4"> 
                <i class="fa fa-briefcase"></i>
                Co-Founder at <a href="#">Complete Tech</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-twitter"></i> 
                <a href="#">@johnnie</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-facebook"></i> 
                <a href="#">fb.me/johnnie</a> 
            </div> 
            <div class="clear"></div> 
            <div class="col-sm-4"> 
                <i class="fa fa-location"></i> 
                <a href="#">Prishtina</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-envelope"></i> 
                <a href="#">john@gmail.com</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-linkedin"></i> 
                <a href="#">johnkennedy</a> 
            </div> 
        </div> 
    </div> 
</div>
<div class="member-entry"> 
    <a href="#" class="member-img"> 
        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-rounded"> 
        <i class="fa fa-forward"></i> 
    </a> 
    <div class="member-details"> 
        <h4> <a href="#">Johnnie Linton</a> </h4> 
        <div class="row info-list"> 
            <div class="col-sm-4"> 
                <i class="fa fa-briefcase"></i>
                Co-Founder at <a href="#">Complete Tech</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-twitter"></i> 
                <a href="#">@johnnie</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-facebook"></i> 
                <a href="#">fb.me/johnnie</a> 
            </div> 
            <div class="clear"></div> 
            <div class="col-sm-4"> 
                <i class="fa fa-location"></i> 
                <a href="#">Prishtina</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-envelope"></i> 
                <a href="#">john@gmail.com</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-linkedin"></i> 
                <a href="#">johnkennedy</a> 
            </div> 
        </div> 
    </div> 
</div>
<div class="member-entry"> 
    <a href="#" class="member-img"> 
        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="img-rounded"> 
        <i class="fa fa-forward"></i> 
    </a> 
    <div class="member-details"> 
        <h4> <a href="#">Johnnie Linton</a> </h4> 
        <div class="row info-list"> 
            <div class="col-sm-4"> 
                <i class="fa fa-briefcase"></i>
                Co-Founder at <a href="#">Complete Tech</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-twitter"></i> 
                <a href="#">@johnnie</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-facebook"></i> 
                <a href="#">fb.me/johnnie</a> 
            </div> 
            <div class="clear"></div> 
            <div class="col-sm-4"> 
                <i class="fa fa-location"></i> 
                <a href="#">Prishtina</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-envelope"></i> 
                <a href="#">john@gmail.com</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-linkedin"></i> 
                <a href="#">johnkennedy</a> 
            </div> 
        </div> 
    </div> 
</div>
<div class="member-entry"> 
    <a href="#" class="member-img"> 
        <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="img-rounded"> 
        <i class="fa fa-forward"></i> 
    </a> 
    <div class="member-details"> 
        <h4> <a href="#">Johnnie Linton</a> </h4> 
        <div class="row info-list"> 
            <div class="col-sm-4"> 
                <i class="fa fa-briefcase"></i>
                Co-Founder at <a href="#">Complete Tech</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-twitter"></i> 
                <a href="#">@johnnie</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-facebook"></i> 
                <a href="#">fb.me/johnnie</a> 
            </div> 
            <div class="clear"></div> 
            <div class="col-sm-4"> 
                <i class="fa fa-location"></i> 
                <a href="#">Prishtina</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-envelope"></i> 
                <a href="#">john@gmail.com</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-linkedin"></i> 
                <a href="#">johnkennedy</a> 
            </div> 
        </div> 
    </div> 
</div>
<div class="member-entry"> 
    <a href="#" class="member-img"> 
        <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="img-rounded"> 
        <i class="fa fa-forward"></i> 
    </a> 
    <div class="member-details"> 
        <h4> <a href="#">Johnnie Linton</a> </h4> 
        <div class="row info-list"> 
            <div class="col-sm-4"> 
                <i class="fa fa-briefcase"></i>
                Co-Founder at <a href="#">Complete Tech</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-twitter"></i> 
                <a href="#">@johnnie</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-facebook"></i> 
                <a href="#">fb.me/johnnie</a> 
            </div> 
            <div class="clear"></div> 
            <div class="col-sm-4"> 
                <i class="fa fa-location"></i> 
                <a href="#">Prishtina</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-envelope"></i> 
                <a href="#">john@gmail.com</a> 
            </div> 
            <div class="col-sm-4"> 
                <i class="fa fa-linkedin"></i> 
                <a href="#">johnkennedy</a> 
            </div> 
        </div> 
    </div> 
</div>
</div>

</body>
</html>
