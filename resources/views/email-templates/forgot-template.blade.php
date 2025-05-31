<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
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
            <h1>Reset Your Password</h1>
        </div>
        <div class="content">
            <p>Hello {{ $user->name }},</p>
            <p>We received a request to reset your password. Click the button below to reset it.</p>
            <a href="{{ $actionLink }}" class="button">Reset Password</a>
           
            <p>If you didn't request a password reset, please ignore this email or contact our support team.</p>
            <p>This link will expire in 24 hours for your security.</p>
        </div>
        <div class="footer">
            <p>© {{ now()->year }} {{ $company_name }}. All rights reserved.</p>
            <p>If you have any questions, contact us at <a href="mailto:{{ $support_email }}">{{ $support_email }}</a>.</p>
        </div>
    </div>
</body>
</html>