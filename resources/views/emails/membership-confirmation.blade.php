<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Form Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 24px;
        }

        p {
            color: #555;
            line-height: 1.6;
            font-size: 16px;
        }

        .membership-number {
            font-weight: bold;
            color: #1d72b8;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1d72b8;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #155a8a;
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>Membership Confirmation</h1>
        </div>

        <h1>Hello, {{ $data['player_name'] }}!</h1>

        <p>Thank you for submitting your membership form. We are excited to welcome you to our community.</p>

        <p>Your Membership Registration Number is:
            <span class="membership-number">{{ $data['reg_no'] }}</span>
        </p>

        <p>Please keep this number safe for future reference.</p>

        <div class="footer">
            <p>Our team will contact you soon.</p>
            <p>Best regards,<br>Star Cricket Club</p>
        </div>
    </div>
</body>

</html>
