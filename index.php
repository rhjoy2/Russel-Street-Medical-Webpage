<?php
    session_start();

require_once("tools/head.php")
?>
<body>
    <?php
    require_once("tools/navbar.php")
    ?>
    <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="bookingpage.php" class="nav-item nav-link">Booking Page</a>
            </div>
            <div class="navbar-nav ml-auto">
                <!-- <a href="registrationpage.php" class="nav-item nav-link">Register</a> -->
                <a href="administration.php" class="nav-item nav-link"> Admin Login</a>
            </div>
        </div>
    </div>
</nav>
    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
            <li data-target="#demo" data-slide-to="4"></li>
            
        </ul>

        <!-- The slideshow, free images obtained from https://unsplash.com/ -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1453847668862-487637052f8a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1476&q=80" alt="PLastic Skull for study">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1453&q=80" alt="Reception area" >
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1460672985063-6764ac8b9c74?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1476&q=80" alt="Dummy heart for study" >
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1538108149393-fbbd81895907?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1528&q=80" alt="Write code as much as you can">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1618015359994-a67bd07e48b5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1476&q=80" alt="Write code as much as you can" >
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <hr>
    <section class ="Our Doctors">
        <h1 class ="section-title">Our Doctors</h1>
    <div class="container-fluid d-flex justify-content-center mt-100">



        <div class="row">
           <div class="col-lg-4">
              <div class="card">
                 <div class="card-body text-center">
                    
                    <img src="https://images.pexels.com/photos/9062164/pexels-photo-9062164.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="rounded-circle" width="400" height="400"> 
                    <h5 class="card-title mt-2 mb-1">Dr. Abigale Laurentis</h5>
                    <p class="mb-3 mt-3">"Abigale Laurentis completed her medical degree at the University of Queensland in 2013, 
                        where she also obtained a Bachelor of Science in Biomedicine. Over her training and practice,
                         Abigale has worked in a variety of clinical settings including specialities at Latrobe Health"</p> 

                 </div>
              </div>
           </div>


           <div class="col-lg-4">
               <div class="card">
                 <div class="card-body text-center">
                    
                    <img src="https://images.pexels.com/photos/6234600/pexels-photo-6234600.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="rounded-circle" width="400" height="400"> 
                    <h5 class="card-title mt-2 mb-1">Dr. Stephen Hill</h5>
                    
                    <p class="mb-3 mt-3">"Stephen Hill graduated from Auckland University in New Zealand in 2014, 
                        and obtained his Fellowship from the Royal Australian College of General Practitioners in 2017. Over his training and practice,
                         Stephen worked in internal medicine at the Royal Children's Hospital Melbourne before transitioning to General Practice."</p>
                    

                 </div>
              </div>
           </div>
           <div class="col-lg-4">
               <div class="card">
                 <div class="card-body text-center">
                    
                    <img src="https://images.pexels.com/photos/8442283/pexels-photo-8442283.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="rounded-circle" width="400" height="400"> 
                    <h5 class="card-title mt-2 mb-1">Ms Kiyoko Tsu</h5>
                    <p class="mb-3 mt-3">"Kiyoko Tsu completed her Bachelor of Nursing at the Yong Loo Lin School of Medicine in Singapore in 2019.
                         She is an accredited Nurse Immuniser and has worked in various hospitals within metropolitan Melbourne"</p>
                   

                 </div>
              </div>
           </div>
        </div>
     </div>
    </section>
     <hr>
    <div class="container">
        <div class="jumbotron">
            <h1>Service Area</h1>
            <p class="lead">
                We invite new paitents to register with us in person on the location mentioned below.
                For current paitents, just use our online booking system to book vaccinations and blood tests! We have a number of tests and shots available.
            </p>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-3">
                <h2>Childhood Vaccination Shots</h2>
                <p>Multiple vaccines are normally administered in combination and may cause the child to be sluggish or feverous for 24 to 48 hours afterwards. </p>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <h2>Influenza Shot</h2>
                <p>The best time to get vaccinated is in April and May each year for optimal protection over the winter months.</p>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <h2>Covid Booster Shot</h2>
                <p>Advice that everyone should arrange to have their third shot as soon as possible and adults over the age of 30 should have their fourth shot to protect against new variant strains. </p>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <h2>Blood Test</h2>
                <p>Some tests require some fasting ahead of time and that a staff member will advise them on this prior to the appointment. </p>
            </div>
        </div>
    </div>
        <article>
            <h2>About Us</h2>
            <article>                   
                <p>
                    Russel Street Medical opened in 2020 and is located in Melbourne’s CBD at 340 Russel Street 
                    Melbourne, just opposite The Old Melbourne Jail and within walking distance of Melbourne Central 
                    Train Station.
                    We strive to help all of our patients with a focus on preventative health care, a view to managing 
                    chronic health conditions with a holistic approach, and with access to a wide range of specialist care 
                    providers when needed.
                    Under partnerships, we are able to offer RMIT students & staff discounted rates.
                </p>
                <table>
                    <tr>
                      <th>Consultation</th>
                      <th>Nomral Fee</th>
                      <th>Rmit Member Fee</th>
                      <th>Medicare Rebate</th>
                    </tr>
                    <tr>
                      <td>Standard</td>
                      <td>$85.00</td>
                      <td>$60.50</td>
                      <td>$39.75</td>
                    </tr>
                    <tr>
                        <td>Long or Complex</td>
                        <td>$130.00</td>
                        <td>$91.00</td>
                        <td>$76.95</td>
                    </tr>
                  </table>
                  <h5>When are we expecting you?</h5>
                  <table>
                    <tr>
                        <th>Weekday</th>
                        <th>Opening Times</th>
                    </tr>
                    <tr>
                        <td>Monday to Sunday</td>
                        <td>9am to 6pm</td>
                    </tr>
                  </table>
                  <figure>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.2290386123072!2d144.96405751546033!3d-37.808103879753304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642cc1ca7073b%3A0xe9acf7dd5128283!2s340%20Russell%20St%2C%20Melbourne%20VIC%203000!5e0!3m2!1sbn!2sau!4v1660596310949!5m2!1sbn!2sau" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </figure>
            </article>
        </article> 
        <hr>
        <?php
        require_once("tools/footer.php")
        ?>
    
</body>

</html>