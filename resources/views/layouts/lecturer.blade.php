<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/lecturer.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Inter+Tight:ital,wght@0,400;0,600;0,700;1,400&family=Just+Another+Hand&family=Pacifico&family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    <section class="body">
        <nav>
            <div class="logo">
                <img src="/images/bluelogo.png" alt="">
                <span>aroma</span>
            </div>
            <ul>
                <li id="active"><a href=""><i class="fa-solid fa-house"></i><span>home</span></a></li>
                <li><a href=""><i class="fa-solid fa-book"></i><span>classes</span></a></li>
                <li><a href=""><i class="fa-solid fa-file-circle-check"></i><span>attendance</span></a></li>
                <li><a href=""><i class="fa-solid fa-laptop"></i><span>grades</span></a></li>
                <li><a href=""><i class="fa-solid fa-dollar-sign"></i><span>logout</span></a></li>
            </ul>
        </nav>
        <div class="controls">
            <div id="controls">
                <div class="serch">
                    <input type="text" name="" id="search" placeholder="search here">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="prof">
                    <div class="buttons">
                        <button><i class="fa-regular fa-bell"></i></button>
                        <button><i class="fa-solid fa-gear"></i></button>
                    </div>
                    <div class="profile">
                        <span>Hello, <br> {{$lecturer->name}}</span>
                        <img src="/images/person.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="main">
                @yield('content')
            </div>
        </div>
    </section>
    <script data-cfasync="false" data-tockify-script="embed"
src="https://public.tockify.com/browser/embed.js"></script>
</body>
</html>