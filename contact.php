<?php
require 'header1.php';
?>

    <script
        src="http://maps.googleapis.com/maps/api/js">
        </script>

        <script>
        var myCenter=new google.maps.LatLng(14.574953, 121.046882);

        function initialize()
        {
        var mapProp = {
          center:myCenter,
          zoom:17,
          mapTypeId:google.maps.MapTypeId.ROADMAP
          };

        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

        var marker=new google.maps.Marker({
          position:myCenter,
          });

        marker.setMap(map);
        
        // Zoom to 20 when clicking on marker
        google.maps.event.addListener(marker,'click',function() {
          map.setZoom(20);
          map.setCenter(marker.getPosition());
          });

        var infowindow = new google.maps.InfoWindow({
          content:"PCN Promopro Inc."
          });

        infowindow.open(map,marker);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
</script>


 
    <!--sample.tab-->
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="heading heading-tertiary">Contact Us</h1>
            </div>
        </div>

        <div id="googleMap" style="width:100%;height:400px;"></div>

        <div class="container">
                    
                <br><br>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="alert alert-success hidden" id="contactSuccess">
                                <strong>Success!</strong> Your message has been sent to us.
                            </div>

                            <div class="alert alert-danger hidden" id="contactError">
                                <strong>Error!</strong> There was an error sending your message.
                            </div>

                            <h4 class="mb-sm mt-sm"><strong>Send us your message</strong></h4>
                            <form id="contactForm" action="php/contact-form.php" method="POST">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Your name *</label>
                                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Your email address *</label>
                                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Subject</label>
                                            <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Message *</label>
                                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" value="Send Message" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">

                            <h4 class="heading-primary mt-lg">Get in <strong>Touch</strong></h4>
                            <p>A strong network of 145 regulars and 5,000 field people nationwide.<br>
                            <strong>7 Regional Offices : </strong><br>Central Luzon (Angeles), South Luzon (Calamba), Visayas (Cebu, Tacloban &Bacolod), Mindanao (Davao & CDO), and 42 Satellite Offices.
                            </p>

                            <hr>

                            <h4 class="heading-primary">The <strong>Office</strong></h4>
                            <ul class="list list-icons list-icons-style-3 mt-xlg">
                                <li><i class="fa fa-map-marker"></i> <strong>Address:</strong> 27 Cresta Street Barangay Malamig, Mandaluyong CIty</li>
                                <li><i class="fa fa-phone"></i> <strong>Phone:</strong> (+632) 718.13.64 to 65</li>
                                <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">pcnpipls@example.com</a></li>
                            </ul>

                            <hr>

                            <h4 class="heading-primary">Business <strong>Hours</strong></h4>
                            <ul class="list list-icons list-dark mt-xlg">
                                <li><i class="fa fa-clock-o"></i> Monday - Friday 8am to 5pm</li>
                                <li><i class="fa fa-clock-o"></i> Saturday - 9am to 2pm</li>
                                <li><i class="fa fa-clock-o"></i> Sunday - Closed</li>
                            </ul>

                        </div>

                    </div>

                </div>

            </div>
    <!--sample.tab-->


<?php
require 'footer1.php';
?>
