<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock Price Notification</title>
</head>
<body>
<h1>Stock Price</h1>
<main>
    Name: {{ $stock['name'] }} <br/>
    Symbol: {{ $stock['symbol'] }} <br/>
    Open: {{ $stock['open'] }} <br/>
    High: {{ $stock['high'] }} <br/>
    Low: {{ $stock['low'] }} <br/>
    Close: {{ $stock['close'] }} <br/>
    Volume: {{ $stock['volume'] }} <br/>
</main>
</body>
</html>
