<!DOCTYPE html>
<html>
<head>
    <title>Hotel-app</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>Tên : {{ $mailData['name'] }}</p>
    <p>Email khách hàng: {{ $mailData['email'] }}</p>
    <p>Nội dung : {{ $mailData['message'] }}</p>
     
    <p>Trân trọng</p>
</body>
</html>