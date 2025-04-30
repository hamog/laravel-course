<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 style="color: red">Hello, This is contact page.</h1>
    <hr>
    <a href="{{ url('/') }}">برو به صفحه اصلی</a>

    <hr>

    <h3>Contact Us:</h3>
    <form action="{{ route('contact.store', [15]) }}" method="post">
        @csrf

        <input type="text" name="name" required> <br>
        <input type="email" name="email" required> <br>
        <button type="submit">Submit</button>
    </form>

</body>
</html>
