<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 5px;
            background-color: #fff;
        }
        .text-center {
            text-align: center;
        }
        .mt-4 {
            margin-top: 4rem;
        }
        .mb-4 {
            margin-bottom: 4rem;
        }
        .order-details {
            border-collapse: collapse;
            width: 100%;
            margin-top: 2rem;
        }
        .order-details th, .order-details td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .order-details th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1 class="mb-4">Order Confirmation</h1>
            <p>Thank you for your order on Nature Checkout! Below are the details:</p>
        </div>
        <table class="order-details">
            <tr>
                <th>Order Number:</th>
                <td>{{ $order->orderNumber }}</td>
            </tr>
            <tr>
                <th>Order Date:</th>
                <td>{{ $order->created_at->format('M d, Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>Name:</th>
                <td>{{ $order->name }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <th>Total Price:</th>
                <td>${{ number_format($order->total_price, 2) }}</td>
            </tr>
            <!-- Add more order details here as needed -->
        </table>
        <div class="text-center mt-4">
            <p>We appreciate your business and hope to see you again soon!</p>
        </div>
    </div>
</body>
</html>
