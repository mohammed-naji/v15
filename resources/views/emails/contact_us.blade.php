<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body style="background: #F2F2F2;padding:50px; font-family: Arial, Helvetica, sans-serif">

    <div style="width: 600px;margin:0 auto;background: #fff;padding: 30px">
        <img width="80" src="{{ asset('uploads/zina2.jpg') }}" alt="">
        <p>There is new contact us data recived with the following information:</p>
        <p><b>Name:</b> {{ $data['name'] }}</p>
        <p><b>Email:</b> {{ $data['email'] }}</p>
        <p><b>Phone:</b> {{ $data['phone'] }}</p>
        <p><b>Subject:</b> {{ $data['subject'] }}</p>
        <p><b>Message:</b> {{ $data['message'] }}</p>
        <br>
        <a style="display: block; width: 50%; border-radius: 50px;background: #8e0d97; color: #fff; text-align: center; padding: 10px; text-decoration: none; margin: 0 auto" href="{{ url('/') }}">Go To Our Website</a>
        <br>
        <p>Best Regards</p>
    </div>

</body>
</html>
