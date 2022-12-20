<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/students.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Inter+Tight:ital,wght@0,400;0,600;0,700;1,400&family=Just+Another+Hand&family=Pacifico&family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">

    <title>Document</title>
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="navDiv">
        <div class="logo"><img src="/images/logo.png" alt="">
        <span>aroma</span></div>
        <div class="navs">
            <ul>
                <li id="active"><a href=""><i class="fa-solid fa-house"></i><span>home</span></a></li>
                <li><a href=""><i class="fa-solid fa-book"></i><span>attendance</span></a></li>
                <li><a href=""><i class="fa-solid fa-file-circle-check"></i><span>course marks</span></a></li>
                <li><a href=""><i class="fa-solid fa-laptop"></i><span>units</span></a></li>
                <li><a href=""><i class="fa-solid fa-dollar-sign"></i><span>fee transactions</span></a></li>
            </ul>
        </div>
        <div class="logout">
            <img src="/images/Bye.png" alt="">
            <p>are you sure you want to logout from e-learning?</p>
            <div class="buttLog">
                <button>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </button>
            </div>
        </div>
    </div>
    <div class="mainCont">
        @yield('content')
    </div>
    <div class="profileDiv">
        <div class="buttons">
            <button><i class="fa-regular fa-bell"></i></button>
            <button><i class="fa-solid fa-gear"></i></button>
        </div>
        <div class="prof">
            <div id="prof">
                <div class="profilepic">
                    <img src="/images/person.jpg" alt="">
                </div>
                <h4>{{$student -> name}}</h4>
                <p>{{$student->id}}</p>
            </div>
            <div id="info">
                <h4>Information</h4>
                <ul>
                    <li>{{$student->email}}</li>
                    <li>{{$student->phone_number}}</li>
                    <li>course:{{$student->course->shortName}}</li>
                    <li>year:{{$student->year}}</li>
                </ul>
            </div>
            <div class="socials">
                <img src="/images/Begin chat.png" alt="">
                <p>see what your collegues are up to</p>
                <div class="buttLog">
                    <button>chat now</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/students.js"></script>
   
</body>

</html>