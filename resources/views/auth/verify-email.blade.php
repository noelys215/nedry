<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
</head>
<body>
<h1>Verify Your Email Address</h1>
@if (session('resent'))
    <div>
        <p>A fresh verification link has been sent to your email address.</p>
    </div>
@endif

<p>Before proceeding, please check your email for a verification link.</p>
<p>If you did not receive the email, <a href="{{ route('verification.resend') }}">click here to request another</a>.</p>
</body>
</html>
