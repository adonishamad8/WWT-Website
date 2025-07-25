@extends('layouts.header')
@section('title', 'Contact Us')

@section('content')
<style>
/* General Styling */
.contact-section {
    background: #f5f5f500;
    padding: 60px 0;
    font-family: 'Poppins', sans-serif;
}

html, body {
    height: 100%;
    overflow: auto;
  background-image:url('https://kagensee.com/wp-content/uploads/2025/03/WhatsApp-Image-2025-02-27-at-13.45.49_06e51cb8-scaled.jpg') !important;
}

/* Layout */
.contact-wrapper {
    display: flex;
    gap: 50px;
    justify-content: space-between;
    flex-wrap: wrap; /* Allow wrapping on smaller screens */
}

/* Contact Info */
.contact-info {
    background: #fff;
    padding: 30px;
    width: 100%; /* Adjusted to take full width */
    max-width: 500px; /* Maximum width */
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.contact-info h2 {
    font-size: 24px;
    color: #222;
    margin-bottom: 10px;
}

.contact-info p {
    font-size: 16px;
    color: #555;
    margin-bottom: 15px;
}

.contact-info a {
    color:#38B5E6;
    text-decoration: none;
    font-weight: bold;
}

/* Contact Form */
.contact-form {
    background: #fff;
    padding: 30px;
    width: 100%; /* Adjusted to take full width */
    max-width: 500px; /* Maximum width */
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.contact-form button {
    background:#38B5E6;
    color: #fff;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
    border-radius: 5px;
}

.contact-form button:hover {
    background: #e0a000;
}

/* Google Map */
.map-container {
    width: 100%;
    height: auto; /* Adjust the height dynamically */
    max-height: 400px; /* Ensure it's not too tall */
    margin-top: 30px;
    border-radius: 10px;
    overflow: hidden;
}

/* Responsive Layout: Stack the sections on smaller screens */
@media (max-width: 768px) {
    .contact-wrapper {
        flex-direction: column; /* Stack the sections */
        gap: 30px; /* Adjust gap */
    }

    .contact-info, .contact-form {
        width: 100%; /* Ensure each section takes full width */
        max-width: 100%;
    }
}

/* Clearfix for contact-section */
.contact-section::after {
    content: "";
    display: table;
    clear: both;
}
.social-icons{
      font-size: 25px; /* Adjust the size as needed */

}
.social-icons :hover{
      font-size: 25px; /* Adjust the size as needed */
          color: #e0a000;


}


footer {
    clear: both;
    margin-top: 30px;
}

</style>

<section class="contact-section">
    <div class="container">
        <div class="contact-wrapper">
            <!-- Contact Info -->
            <div class="contact-info">
                <h2>Contact Us</h2>
                <p> Clemenceau, Minet El-Hosn, Justinian Str. Justinian Building, Ground Floor, Beirut – Lebanon</p>
                <p> <a href="tel:+9611366505">+961 1 366 505</a></p>
                <hr>
                <p>Ain El Mreisseh, Ibn Sina Str. Le 77, 1st Floor, Beirut – Lebanon</p>
                <p> <a href="tel:+9611365931">+961 1 365 931</a></p>
                  <hr>
                <p>Ain El Mreisseh, Ibn Sina Str. MINA 365,<br>5th Floor, Beirut – Lebanon</p>
                <p> <a href="tel:+9611365931">+961 21 366 285</a></p>
                <p> <a href="mailto:info@worldwidetravel-lb.com">info@worldwidetravel-lb.com</a></p>

                 <div class="social-icons">
                    <a href="https://www.facebook.com/worldwidetravelandtourism"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/worldwidetravelandtourism/"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/worldwide-travel-and-tourism/"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <h2>Get in Touch</h2>
                <form method="POST" class="ajax-form">
                    @csrf
                    <input type="text" name="fname" placeholder="First Name" required>
                    <input type="text" name="lname" placeholder="Last Name" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="text" name="phone" placeholder="Phone" required>
                    <textarea name="message" placeholder="Your Message" required></textarea>
                    <button type="submit">Send Message</button>
                    <span id="responsemsg"></span>
                </form>
            </div>

        </div>

        <!-- Google Map -->
        <div class="map-container">
            <div id="map"></div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOZmjVskSQgV7V6oXgCX1_C5TUuwkUKjY"></script>
<script type="text/javascript">
    var locations = [
        ['<a target="_blank" href="#">Clemenceau, Minet El-Hosn, Justinian Str. Justinian Building, Ground floor</a>', 33.897950, 35.493650, 4],
        ['<a target="_blank" href="#">Ain El Mreisseh, Ibn Sina Str. Le 77, 1st Floor</a>', 33.901330, 35.491570, 3],
          ['<a target="_blank" href="#">Ain El Mreisseh, Ibn Sina Str. MINA 365, 5th Floor, Beirut – Lebanon</a>', 33.90195725803825, 35.493585985200724],
        
        
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: new google.maps.LatLng(33.901330, 35.491570),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();
    var marker, i;

    for (i = 0; i < locations.length; i++) {  
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
            animation: google.maps.Animation.DROP,
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("form.ajax-form").submit(function(e) {
        e.preventDefault();

        var fname = $("input[name=fname]").val();
        var lname = $("input[name=lname]").val();
        var email = $("input[name=email]").val();
        var phone = $("input[name=phone]").val();
        var message = $("textarea[name=message]").val();
        
        // Simple validation
        if (!fname || !lname || !email || !phone || !message) {
            $('#responsemsg').html('<span style="color: red;">Please fill all fields.</span>');
            return;
        }

        var token = $("input[name=_token]").val();

        $.ajax({
            type: 'POST',
            url: '{{ route('front.sendemail') }}',
            dataType: 'json',
            data: { _token: token, fname: fname, lname: lname, email: email, phone: phone, message: message },
            beforeSend: function() {
                $('#responsemsg').html('<img id="ajaxloader" src="{{ asset("assets/images/loader.gif") }}" />');
            },
            success: function(data) {
                $("form.ajax-form")[0].reset();
                $('#responsemsg').html('<span style="color: green;">' + data.success + '</span>');
            },
            fail: function(jqXHR, textStatus, errorThrown) {
                $('#responsemsg').html('<span style="color: red;">An error occurred. Please try again later.</span>');
            }
        });
    });
</script>
@endsection
