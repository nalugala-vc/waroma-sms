<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/applications.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Inter+Tight:ital,wght@0,400;0,600;0,700;1,400&family=Island+Moments&family=Just+Another+Hand&family=Pacifico&family=Poppins:ital,wght@0,400;1,600&family=Zilla+Slab:ital,wght@0,400;0,500;0,600;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    @if (session('status'))
        <div class="alert alert-warning">
            {{ session('status') }}
        </div>
    @endif
    @if (session('application'))
        <div class="alert alert-success">
            {{ session('application') }}
        </div>
    @endif
    <nav>
        <div class="logo">
            <img src="/images/logo.png" alt="">
            <span>aroma</span>
        </div>
        <div class="apply">
            <span>students application form</span>
        </div>
    </nav>
    <div class="body">
        <div class="main">
            <div class="form">
                <span>Tell us more about you</span>
                <br>
                <span>To help us consider your application</span>
            </div>
            <form method="POST" action="/applications/submit" >
                @csrf
                <div class="inp">
                    <div>
                        <input type="text" placeholder="Name" name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <input type="email" placeholder="Email" name="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="inp">
                    <div>
                        <input type="text" placeholder="Phone Number" name="phone_number">
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <input type="text" placeholder="Former Highschool" name="former_highschool">
                        @error('former_highschool')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="inp">
                    <div>
                        <input type="number" placeholder="Age" name="age">
                        @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <select name="course_id">
                            <option value="">Interested Course</option>
                            @foreach($course as $studcourse)
                                <option value="{{$studcourse->id}}">{{$studcourse->name}}</option>
                            @endforeach
                        </select>
                        @error('course')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="inp">
                    <div>
                        <select name="KCSE_Grade" id="">
                            <option value="">KCSE Grade</option>
                            <option value="A">A</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B">B</option>
                            <option value="B-">B-</option>
                            <option value="C+">C+</option>
                            <option value="C">C</option>
                            <option value="C-">C-</option>
                            <option value="D+">D+</option>
                            <option value="D">D</option>
                            <option value="D-">D-</option>
                            <option value="E">E</option>
                        </select>
                        @error('KCSE_Grade')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <input type="number" placeholder="KCSE Points" name="KCSE_points">
                        @error('KCSE_points')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="inp">
                    <div>
                        <textarea name="student_description" id="" cols="70" rows="5">Tell us about you</textarea>
                        @error('student_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="div">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
        <div class="imagediv">
            <img src="/images/applications.png" alt="">
        </div>
    </div>
</body>
</html>
