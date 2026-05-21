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

.whistle-title {
    font-family: 'Nunito', 'Poppins', sans-serif;
    font-size: 34px;
    font-weight: 700;
    margin-bottom: 12px;
    color: #1f5fae;
}

.whistle-intro {
    max-width: 850px;
    margin: 0 auto 12px;
    font-size: 20px;
    color: #2c6fc5;
    line-height: 1.8;
    font-style: italic;
    font-family: 'Georgia', 'Times New Roman', serif;
}

.whistle-followup {
    max-width: 850px;
    margin: 0 auto;
    font-size: 16px;
    color: #222;
    line-height: 1.7;
    font-family: 'Poppins', sans-serif;
}

.policy-note {
    margin-top: 18px;
    padding-top: 14px;
    border-top: 1px solid #d8e2f2;
    font-size: 14px;
    color: #274870;
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
            <h1 class="whistle-title">Whistleblowing</h1>
            <p class="whistle-intro">
                Worldwide Travel and Tourism S.A.L. is committed to the highest standards of integrity, transparency, and ethical conduct. We encourage employees, partners, suppliers, and other stakeholders to come forward and voice any concerns related to misconduct, unethical behavior, or policy violations.
            </p>
            <p class="whistle-followup">
                Reports may be submitted confidentially through the form below, with the option of remaining anonymous. Whistleblowers who report in good faith are officially protected, and WWTT strictly prohibits any form of retaliation or adverse action against them.<br><br>
                To help us review and address your concern effectively, please provide as much relevant information and detail as possible.
            </p>
            <div class="policy-note">
                <strong>Whistleblowing Policy:</strong> The official policy document will be added here once the signed version is received.
            </div>
        </div>

        <div class="contact-wrapper">
            <div class="contact-form">
                <h2>Submit a Report</h2>
                <form method="POST" class="ajax-form">
                    @csrf
                    <input type="text" name="full_name" placeholder="Full Name (Optional)">
                    <div style="display:flex; gap:10px;">
                        <input type="email" name="email" placeholder="Email Address (Optional)">
                        <input type="text" name="phone" placeholder="Phone No. / Contact No. (Optional)">
                    </div>

                    <input type="text" name="country" placeholder="Country (Optional)">

                    <select name="subject" required>
                        <option value="" selected disabled>Complaint Type</option>
                        <option value="Fraud or Corruption">Fraud or Corruption</option>
                        <option value="Harassment or Discrimination">Harassment or Discrimination</option>
                        <option value="Health and Safety Concerns">Health and Safety Concerns</option>
                        <option value="Unethical Behavior">Unethical Behavior</option>
                        <option value="Other">Other</option>
                    </select>

                    <textarea name="message" placeholder="Your Message / Details of the Concern" required rows="6"></textarea>

                    <div style="margin: 8px 0 14px;">
                        <label for="attachment" style="font-size: 14px; font-weight: 600; color: #333; display: block; margin-bottom: 6px;">Upload Attachment</label>
                        <input type="file" name="attachment" id="attachment" style="margin: 0;">
                    </div>
                    
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

        var full_name = $("input[name=full_name]").val();
        var email = $("input[name=email]").val();
        var phone = $("input[name=phone]").val();
        var country = $("input[name=country]").val();
        var subject = $("select[name=subject]").val();
        var message = $("textarea[name=message]").val();
        var anonymous = $("input[name=anonymous]").is(':checked') ? 1 : 0;
        var attachment = $("input[name=attachment]")[0].files[0];

        if (!subject || !message) {
            $('#responsemsg').html('<span style="color: red;">Please select a subject and enter a message.</span>');
            return;
        }

        var token = $("input[name=_token]").val();

        var formData = new FormData();
        formData.append('_token', token);
        formData.append('fname', anonymous ? 'Anonymous' : (full_name || 'Anonymous'));
        formData.append('lname', anonymous ? 'User' : '-');
        formData.append('email', anonymous ? 'anonymous@worldwidetravel-lb.com' : (email || 'anonymous@worldwidetravel-lb.com'));
        formData.append('phone', anonymous ? 'N/A' : (phone || 'N/A'));
        formData.append('subject', 'Whistleblowing: ' + subject);
        formData.append('message', message + (country ? ('\nCountry: ' + country) : ''));

        if (attachment) {
            formData.append('attachment', attachment);
        }

        $.ajax({
            type: 'POST',
            url: '{{ route('front.sendemail') }}',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,
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
