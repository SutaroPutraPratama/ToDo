{{-- @extends('layout')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body> --}}
  {{-- <center>
        <form method="POST" action="{{ route('register.create') }}" class="formLogin">
          @csrf

          <div class="form-outline mb-4">
            <input type="text" id="form2Example1" name="username" class="form-control" />
            <label class="form-label" for="form2Example1">username</label>
            @error('username')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form2Example1" name="email" class="form-control" />
            <label class="form-label" for="form2Example1" name="email">Email address</label>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        
          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form2Example2"  name="password" -class="form-control" />
            <label class="form-label" for="form2Example2" name="password">Password</label>
            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary btn-block mb-4">register</button> --}}
            {{-- <div class="card" style="width: 300px; height:200px; margin-left: 16cm; margin-top:75px; border-radius:10px; margin-top:200px;">
              <h3>Login disini</h3>
          <form action="{{ route('register.create') }} method="POST">
            @csrf
            Usename<input type="text" name="username" placeholder="masukan username" style="margin-top: 10px;">
            <br>
            Email<input type="email" name="email" placeholder="masukan email" style="margin-top: 10px;">
            <br>
            Password<input type="password" name="password" placeholder="masukan password" style="margin-top: 10px;">
            <br>
            <button type="submit" style="margin-top: 10px;">Register</button>
        
        </form>
            </div>
  
  @endsection --}}

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card" style="width: 300px; margin-left: 16cm; margin-top:75px; border-radius:10px; margin-top:200px;
    padding: 10px;
    border: 2px solid black;">
    <h3 style="margin-left:90px;">Register disini</h3>
    <br>
    @if (session('berhasil membuat akun'))
    <p style="color:black">{{session('berhasil membuat akun')}}</p>
    @endif
    <form action="{{route('register.create')}}" method="POST">
        @csrf
        Usename<input type="text" name="username" placeholder="masukan username" style="margin-top: 10px; margin-left:12px;">
        <br>
        Email<input type="email" name="email" placeholder="masukan email" style="margin-top: 10px; margin-left:33px;">
        <br>
        Password<input type="password" name="password" placeholder="masukan password" style="margin-top: 10px; margin-left:10px;">
        <br>
        <button type="submit" style=" width:173px; margin-top: 10px; margin-left:70px;">Register</button> 
        <P>sudah punya akun? login <a href="/login">disini</a></P> 
    </form>
</div>
</body>
</html>