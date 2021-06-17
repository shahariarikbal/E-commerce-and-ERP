<!doctype html>
<html lang="en">

<body>
<div>
    <p>Dear {{ $checkout->name }},</p>
    <p>Your account has been created. Please click the following link to active your account:</p>
    <a href="{{ url('customer/checkout', $checkout->email_verification_token) }}">
        {{ url('customer/checkout', $checkout->email_verification_token) }}
    </a>
    <br/>

    <p>Thanks!</p>
</div>
</body>
</html>
