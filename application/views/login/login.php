<!DOCTYPE html>

<html lang="en">

<head>
    <title>Warta Sukun </title>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Gadget Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <script>
        addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <!-- Meta tags -->
    <!-- font-awesome icons -->
    <link href="<?php echo base_url().'assets/login/font-awesome.min.css'?>" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!--stylesheets-->
    <link href="<?php echo base_url().'assets/login/style.css'?>" rel='stylesheet' type='text/css' media="all">
    <!--//style sheet end here-->

    <link href="<?php echo base_url('/assets/sweetalert/sweetalert2.css')?>" rel="stylesheet" />
    <script src="<?php echo base_url('/assets/sweetalert/sweetalert2.min.js')?>"></script>
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
</head>
<body>
    <h1 class="error"></h1>
    <!---728x90--->
    <div class="w3layouts-two-grids">
        <!---728x90--->
        <div class="mid-class">
            <div class="img-right-side">
                <h1 style="font-size:40px">Warta GKJW Sukun</h1>
                <!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget Lorem ipsum dolor sit
                amet, consectetuer adipiscing elit. Aenean commodo ligula ege</p> -->
                <img src="<?php echo base_url().'assets/login/b11.png'?>" class="img-fluid" alt="">
            </div>
            <div class="txt-left-side" style="height:fit-content">
                <h2> Login Here </h2>
                <form method="post" action="<?php echo base_url().'admin/login/proses'?>">
                    <div class="form-left-to-w3l">
                        <span class="fa fa-user-o" aria-hidden="true"></span>
                        <input type="text" name="username" placeholder="Username" required="">

                        <div class="clear"></div>
                    </div>
                    <div class="form-left-to-w3l ">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="password" placeholder="Password" required="">
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="btnn">
                        <button type="submit">Login</button>
                    </div>
                </form>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!---728x90--->
    <?php echo $this->notification->display(); ?>

    <script>
      $(document).ready(function() {
          demo.initChartsPages();
      });
      function hidden_sweet() {
        document.getElementById("sweet_success").remove();
    };

    jQuery(window).keypress(function (e) {
        if (e.which === 13 || e.which === 27) {
            jQuery("#event_sweet").click();
        }
    });
</script>
</body>

</html>