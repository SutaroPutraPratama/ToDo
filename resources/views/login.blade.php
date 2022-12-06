<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
</head>
<body style="">
    <div class="card" style="width: 300px; margin-left: 16cm; margin-top:75px; border-radius:10px; margin-top:200px;
    padding: 10px;
    border: 2px solid black;">
    <h3 style="margin-left:90px;">Login disini</h3>
    <br>
    @if (session('berhasil membuat akun'))
    <p style="color:black">{{session('berhasil membuat akun')}}</p>
    @endif
    <form action="{{route('login-baru')}}" method="POST">
        @csrf
        Usename<input type="text" name="username" placeholder="masukan username" style="margin-top: 10px; margin-left:12px;">
        <br>
        Email<input type="email" name="email" placeholder="masukan email" style="margin-top: 10px; margin-left:33px;">
        <br>
        Password<input type="password" name="password" placeholder="masukan password" style="margin-top: 10px; margin-left:10px;">
        <br>
        <button type="submit" style="width:173px; margin-top: 10px; margin-left:70px;">Login</button>

        @if(session('eror'))
        {{session('error')}}
        @endif
<br>
{{-- <div class="belum-login" style="margin-left: 80px;">
        @if(session('isLogin'))
        {{session('isLogin')}}
        @endif
</div> --}}
        <p>Belum punya akun?register <a href="/register">disini</a></p> 
        
    </form>
</div>
</body>
</html>