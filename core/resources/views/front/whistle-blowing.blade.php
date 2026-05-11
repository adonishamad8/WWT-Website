@extends('layouts.header')
@section('title', 'Whistle Blowing | Worldwide Travel & Tourism')

@section('content')
<style>
/* General Styling */
.whistle-section {
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
    justify-content: center;
    flex-wrap: wrap;
}

/* Contact Form */
.contact-form {
    background: #fff;
    padding: 30px;
    width: 100%;
    max-width: 650px;
    border-radius: 12px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
}

.contact-form input,
.contact-form textarea,
.contact-form select {
    width: 100%;
    padding: 11px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
}

.contact-form button {
    background:#38B5E6;
    color: #fff;
    padding: 12px 15px;
    border: none;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
    border-radius: 8px;
    font-weight: 700;
}

.contact-form button:hover {
    background: #2aa6d6;
}

/* Responsive Layout */
@media (max-width: 768px) {
    .contact-wrapper {
        flex-direction: column;
        gap: 25px;
    }
}
</style>

<section class="whistle-section">
    <div class="container">

        <div class="mb-4 text-center" style="background: rgba(255,255,255,0.88); padding:18px; border-radius:12px; box-shadow: 0 0 15px rgba(0,0,0,0.06);">
            <h1 style="font-size:32px; font-weight:800; margin-bottom:10px; color:#111;">
                Whistle Blowing
            </h1>
            <p style="max-width:850px; margin:0 auto; font-size:16px; color:#333; line-height:1.6;">
                You should directly raise your concerns by giving a call to the Internal Audit department at <strong>+961 1 366 505</strong> or by filling the below form. You may choose to reveal your identity or keep it anonymous, bearing in mind that in case your identity is known, you are officially protected. Please fill the below form with as much information and details as possible. This will help the investigators to focus on the main issue quickly.
            </p>
        </div>

        <div class="contact-wrapper">
            <div class="contact-form">
                <h2>Submit a Report</h2>
                <form method="POST" class="ajax-form">
                    @csrf
                    <div style="display:flex; gap:10px;">
                        <input type="text" name="fname" placeholder="First Name (Optional)">
                        <input type="text" name="lname" placeholder="Last Name (Optional)">
                    </div>
                    <div style="display:flex; gap:10px;">
                        <input type="email" name="email" placeholder="Email Address (Optional)">
                        <input type="text" name="phone" placeholder="Phone (Optional)">
                    </div>

                    <select name="subject" required>
                        <option value="" selected disabled>Select Subject</option>
                        <option value="Fraud or Corruption">Fraud or Corruption</option>
                        <option value="Harassment or Discrimination">Harassment or Discrimination</option>
                        <option value="Health and Safety Concerns">Health and Safety Concerns</option>
                        <option value="Unethical Behavior">Unethical Behavior</option>
                        <option value="Other">Other</option>
                    </select>

                    <textarea name="message" placeholder="Your Message / Details of the Concern" required rows="6"></textarea>
                    
                    <div style="margin-bottom: 15px; font-size: 13px; color: #555;">
                        <label><input type="checkbox" name="anonymous" value="1" style="width: auto; margin-right: 5px;"> I wish to submit this report anonymously</label>
                    </div>

                    <button type="submit">Submit Report</button>
                    <span id="responsemsg"></span>
                </form>
            </div>
        </div>

    </div>
</section>
@endsection

@section('scripts')
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
        var subject = $("select[name=subject]").val();
        var message = $("textarea[name=message]").val();
        var anonymous = $("input[name=anonymous]").is(':checked') ? 1 : 0;

        if (!subject || !message) {
            $('#responsemsg').html('<span style="color: red;">Please select a subject and enter a message.</span>');
            return;
        }

        var token = $("input[name=_token]").val();

        $.ajax({
            type: 'POST',
            url: '{{ route('front.sendemail') }}',
            dataType: 'json',
            data: { 
                _token: token, 
                fname: anonymous ? 'Anonymous' : (fname || 'Anonymous'), 
                lname: anonymous ? 'User' : (lname || 'User'), 
                email: anonymous ? 'anonymous@worldwidetravel-lb.com' : (email || 'anonymous@worldwidetravel-lb.com'), 
                phone: anonymous ? 'N/A' : (phone || 'N/A'), 
                subject: 'Whistle Blowing: ' + subject, 
                message: message 
            },
            beforeSend: function() {
                $('#responsemsg').html('<img id="ajaxloader" src="{{ asset("assets/images/loader.gif") }}" />');
            },
            success: function(data) {
                $("form.ajax-form")[0].reset();
                $('#responsemsg').html('<span style="color: green;">' + (data.success ?? 'Your report has been submitted securely and confidentially.') + '</span>');
            },
            error: function() {
                $('#responsemsg').html('<span style="color: red;">An error occurred. Please try again later.</span>');
            }
        });
    });
</script>
@endsection
