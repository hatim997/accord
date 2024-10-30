<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif; 
            line-height: 1.6; 
            color: #333;
        }
        a {
            color: #1a73e8;
        }
    </style>
</head>
<body>
    <h2>Email Notification</h2>
    
    @if(isset($adminName))
        <p>Hello {{ $adminName }},</p>
        @if(isset($userName) || isset($verificationCode) || isset($addedBy) || isset($addingUserCode))
            <p>A new user has registered:</p>
            <ul>
                <li><strong>Name:</strong> {{ $userName ?? 'N/A' }}</li>
                <li><strong>Verification Code:</strong> {{ $verificationCode ?? 'N/A' }}</li>
                <li><strong>Added By:</strong> {{ $addedBy ?? 'N/A' }}</li>
                <li><strong>Adding User's Code:</strong> {{ $addingUserCode ?? 'N/A' }}</li>
            </ul>
        @else
            <p>No new user details are available.</p>
        @endif
    @else
        <p>Your verification code is: {{ $code }}</p>
    @endif

    <p>Thank you!</p>
</body>
</html>
