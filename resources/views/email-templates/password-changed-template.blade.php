<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Changed Successfully</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4a90e2;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px;
            text-align: center;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
            margin: 0 0 20px;
        }
        .info-box {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
            text-align: left;
        }
        .info-box p {
            margin: 0;
            font-size: 16px;
        }
        .info-box strong {
            color: #4a90e2;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4a90e2;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
        }
        .button:hover {
            background-color: #357abd;
        }
        .footer {
            padding: 20px;
            background-color: #f9f9f9;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        @media screen and (max-width: 600px) {
            .container {
                margin: 10px;
                border-radius: 0;
            }
            .header h1 {
                font-size: 20px;
            }
            .content {
                padding: 20px;
            }
            .content p {
                font-size: 14px;
            }
            .info-box {
                padding: 10px;
            }
            .info-box p {
                font-size: 14px;
            }
            .button {
                font-size: 14px;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Password Changed Successfully</h1>
        </div>
        <div class="content">
            <p>Hello {{ $user->name }},</p>
            <p>Your password has been successfully updated. Below are your account details:</p>
            <div class="info-box">
                <p><strong>Username/Email:</strong> {{ $user->email }}</p>
                @if($new_password)
                    <p><strong>New Password:</strong> {{ $new_password }}</p>
                @endif

            </div>
            <p>For security, we recommend keeping your password safe and not sharing it with anyone.</p>
            <p>If you did not initiate this change, please contact our support team immediately.</p>
            <a href="{{ $loginLink }}" class="button">Log In to Your Account</a>
        </div>
        <div class="footer">
            <p>© {{ now()->year }} Larablog. All rights reserved.</p>
           
        </div>
    </div>
</body>
</html>