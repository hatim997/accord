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
    
    @if(isset($admin))
        <p>Hello {{ $admin }},</p>
        @if(isset($admin->email) || isset($subscriptionPlan->name) || isset($orderTime) )
            <p>A new user has registered:</p>
            <ul>
                <li><strong>Email:</strong> {{ $admin->email ?? 'N/A' }}</li>
                <li><strong>Subscription Plan:</strong> {{ $subscriptionPlan->name ?? 'N/A' }}</li>
                <li><strong>Order Time:</strong> {{ $orderTime ?? 'N/A' }}</li>
                
            </ul>
        @else
            <p>No new user details are available.</p>
        @endif
    @else
    <p>Hello {{ $user }},</p>
    @if(isset($user->email) || isset($subscriptionPlan->name) || isset($orderTime) || isset($orderInvoice) )
        <p>A new user has registered:</p>
        <ul>
            
            <li><strong>Invoice:</strong> {{ $orderInvoice ?? 'N/A' }}</li>
            <li><strong>Email:</strong> {{ $user->email ?? 'N/A' }}</li>
            <li><strong>Subscription Plan:</strong> {{ $subscriptionPlan->name ?? 'N/A' }}</li>
            <li><strong>Order Time:</strong> {{ $orderTime ?? 'N/A' }}</li>
            
        </ul>
    @else
        <p>No new user details are available.</p>
    @endif
    @endif

    <p>Thank you!</p>
</body>
</html>
