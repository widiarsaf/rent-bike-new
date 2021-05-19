<html>

<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Goweslurr Malang</title>
    <link rel="stylesheet" href="assetsCustomer/homepage.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <section class="header">
        <nav>
            <a href="index.html"><img src="assetsCustomer/logo-remove.png" style="width: 25%;"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="">HOME</a></li>
                    <li><a href="">ABOUT US</a></li>
                    <li><a href="">SEWA</a></li>
                    <li><a href="">LOGIN</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>GOWESLURR MALANG</h1>
            <p>Lorem Ipsum kjhgbvftfvghbjngfvcvbjnhbghnhnj</p><br><br>
            <a href="" class="hero-btn">Visit Us</a>
        </div>
    </section>
    <section class="packages">
        <h1><b>Bike Rental Packages</b></h1><br>
        <div class="row">
            <div class="packages-col">
                <h3><b>Weekday Packages</b></h3><br>
                <p>1 Hour Package : Rp. 10.000</p>
                <p>2 Hours Package : Rp. 20.000</p>
                <p>3 Hours Package : Rp. 30.000</p>
                <p>1 Day Package : Rp. 100.000</p>
            </div>
            <div class="packages-col">
                <h3><b>Weekend Packages</b></h3><br>
                <p>1 Hour Package : Rp. 7.500</p>
                <p>2 Hours Package : Rp. 15.000</p>
                <p>3 Hours Package : Rp. 22.500</p>
            </div>
        </div>
    </section>
    <section class="bicycle">
        <h1><b>Bicycle Type</b></h1><br>
        <div class="row">
            <div class="bicycle-col">
                <img src="assetsCustomer/mtb.jpg">
                <div class="layer">
                    <h3>Mountain Bike</h3>
                </div>
            </div>
            <div class="bicycle-col">
                <img src="assetsCustomer/seli.jpg"><br>
                <div class="layer">
                    <h3>Sepeda Lipat</h3>
                </div>
            </div>
            <div class="bicycle-col">
                <img src="assetsCustomer/fixie.jpg"><br>
                <div class="layer">
                    <h3>Fixie Bike</h3>
                </div>
            </div>
            <div class="bicycle-col">
                <img src="assetsCustomer/roadbike.jpg">
                <div class="layer">
                    <h3>Road Bike</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="location">
        <h1 style="text-align: center;"><b>Our Location</b></h1><br>
        <div class="peta-responsive">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.199492690259!2d112.64072041477937!3d-7.978321694253882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629aefb25b6af%3A0x2e42001be9d62c6e!2sGoweslurr%20malang!5e0!3m2!1sen!2sid!4v1619504892816!5m2!1sen!2sid"
                width="600" height="450" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
    <footer>
        <div class="footer-content">
            <h3>GOWESLURR MALANG</h3>
            <p>Lorem ipsum dolor sit, rtfgyhujioidsfgincvjd</p>
            <ul class="contact">
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2021 Goweslurr.</p>
        </div>
    </footer>
    <script>
        var navLinks = document.getElementById("navLinks");
        function showMenu(){
            navLinks.style.right= "0";
        }
        function hideMenu(){
            navLinks.style.right= "-200px";
        }
    </script>
</body>

</html>