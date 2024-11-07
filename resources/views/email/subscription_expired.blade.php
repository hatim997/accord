<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <p>Dear {{ $userName }},</p>

  <p>Your subscription expired on {{ \Carbon\Carbon::parse($endDate)->format('Y-m-d') }}.</p>

  <p>Please renew your subscription to continue enjoying our services.</p>

  <p>Thank you!</p>
</body>
</html>
