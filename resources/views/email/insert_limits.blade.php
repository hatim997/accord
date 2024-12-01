<!DOCTYPE html>
<html>
<head>
    <title>Request to Insert Your Limits</title>
</head>
<body>
    @php
    $name = App\Models\ShipperInfos::where('user_id', $id)->find();
    @endphp
    <p>Dear {{ $name->name }},</p>
    
    
    <p>Thank you,<br>Your Service Team</p>
</body>
</html>
