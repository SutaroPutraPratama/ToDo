@extends('layout')

@section('content')
{{-- <div class="position-absolute top-0 start-50 translate-middle-x">
  <div class="card">
    <h1 class="coba">LOGIN DISINI</h1>
    <form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div> --}}

<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
  <center>

    {{-- <div class="main">  	
      <input type="checkbox" id="chk" aria-hidden="true">
  
        <div class="signup" style="background-color: white;">
            <label for="chk" aria-hidden="true" style="color:black;">Login disini</label>
        </div>
  
        <div class="login">
          <form method="POST" action="/login" class="formLogin">
            <label for="chk" aria-hidden="true" class="jedaj">Login</label>
            <input type="email" name="email" class="jedaj" placeholder="Email" required="">
            <input type="password" name="password" class="jedaj" placeholder="Password" required="">
            <button>Login</button>
          </form>
          {{ session('berhasil') }}
          <p style="margin-top: 14px">belum punya akun? bikin dulu <a href="/register">disini</a></p>
        </div>
    </div>
     --}}

     <form method="POST" action="/login" class="formLogin">
      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="form2Example1" class="form-control" />
        <label class="form-label" for="form2Example1">Email address</label>
      </div>
    
      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="form2Example2" class="form-control" />
        <label class="form-label" for="form2Example2">Password</label>
      </div>
    
      <!-- 2 column grid layout for inline styling -->
      <div class="row mb-4">
        <div class="col d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
            <label class="form-check-label" for="form2Example31"> Remember me </label>
          </div>
        </div>
    
      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>
    
      <!-- Register buttons -->
      <div class="text-center">
        <p>Belum punya akun? <a href="/registrasi">Register</a></p>

      </div>
    </form>
  </center>

@endsection