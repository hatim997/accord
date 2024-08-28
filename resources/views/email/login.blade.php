<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Message</title>
</head>
<body>
<p>
    Dear {{$name}},
</p>
<p>
    We hope this message finds you well. This is to confirm that your login to COI 360 has been successful. You can now access your account and explore all our features.
</p>
<p>
    Here are your login details:
    - Username: {{$name}}
    - Email: {{$email}}
    - Password: {{$password}}
</p>
<p>
    If you did not initiate this login or have any concerns about your account security, please contact us immediately at [Support Email Address].
</p>
<p>
    Thank you for choosing COI 360. We look forward to serving you!
</p>
<p>
Best regards,
COI 360 Team
</p> 
</body>
</html>