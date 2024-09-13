<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Membership Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            padding: 20px;
        }

        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #dddddd;
        }

        .heading {
            font-size: 18px;
            font-weight: bold;
        }

        .details {
            margin-top: 20px;
        }

        .details td {
            padding: 5px;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <h1 class="heading">New Membership Submission</h1>

            <p>Dear Admin,</p>
            <p>A new player has submitted a membership form. Below are the details:</p>

            <table class="details">
                <tr>
                    <td><strong>Player Name:</strong></td>
                    <td>{{ $data['name'] }}</td>
                </tr>
                <tr>
                    <td><strong>Phone:</strong></td>
                    <td>{{ $data['phone'] }}</td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td>{{ $data['email'] }}</td>
                </tr>
                <tr>
                    <td><strong>Status In Cambodia:</strong></td>
                    <td>{{ $data['status_in_cambodia'] }}</td>
                </tr>
                <tr>
                    <td><strong>City:</strong></td>
                    <td>{{ $data['city'] }}</td>
                </tr>
                <tr>
                    <td><strong>Nationality:</strong></td>
                    <td>{{ $data['nationality'] }}</td>
                </tr>
                <tr>
                    <td><strong>Player Type:</strong></td>
                    <td>{{ $data['player_type'] }}</td>
                </tr>
                <tr>
                    <td><strong>Jersey Name:</strong></td>
                    <td>{{ $data['jersey_name'] }}</td>
                </tr>
                <tr>
                    <td><strong>Jersey Size:</strong></td>
                    <td>{{ $data['jersey_size'] }}</td>
                </tr>
                <tr>
                    <td><strong>Jersey Number:</strong></td>
                    <td>{{ $data['jersey_number'] }}</td>
                </tr>
            </table>

            <p>
                The player's <strong>photo</strong> and <strong>payment screenshot</strong> (if applicable) are attached
                with this email.
            </p>

            <div class="footer">
                <p>This is an automated message. Please do not reply to this email.</p>
            </div>
        </div>
    </div>
</body>

</html>
