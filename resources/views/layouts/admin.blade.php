<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Inter+Tight:ital,wght@0,400;0,600;0,700;1,400&family=Just+Another+Hand&family=Pacifico&family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
   <div class="maindis">
    <nav>
        <div class="logo">
            <img src="/images/bluelogo.png" alt="">
            <span>aroma</span>
        </div>
        <ul>
            <li><a href="">Dashboard</a></li>
            <li><a href="">Applications</a></li>
            <li><a href="">Students</a></li>
            <li><a href="">Lecturers</a></li>
        </ul>
        <div class="profileDiv">
            <img src="/images/person.jpg" alt="">
            <h5>Venessa Chebukwa</h5>
            <p>vanessachebukwa@gmail.com</p>
            <div class="buttons">
                <button><i class="fa-regular fa-bell"></i></button>
                <button><i class="fa-solid fa-gear"></i></button>
        </div>
        </div>
    </nav>
    <div class="content">
        @yield('content')
    </div>
   </div>
</body>
</html>