@extends('layout')
@section('content')
<div class="card" style="width: 300px; box-shadow: 0px 1px 400px -14px rgba(255, 123, 0, 0.75);
-webkit-box-shadow: 0px 1px 400px -14px rgba(255, 115, 0, 0.75);
-moz-box-shadow: 0px 1px 400px -14px rgba(0,0,0,0.75); margin-left: 16cm; margin-top:75px; border-radius:10px;">
    <h3 style="font-weight:100; margin-left:80px; margin-top:10px;">Buat disini</h3>
    <form action="/store" method="POST" class="" style="padding: 10px">
        @csrf
        @if ($errors->any())
        <div class="alert alert danger">
            <ul>
                @foreach ($errors->all as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="d-flex flex-column">
        <input type="text" name="title" placeholder="judul">
        @error('title')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="d-flex flex-column">
        <input type="date" name="date" placeholder="Tanggal" style="margin-top: 10px">
        @error('date')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
        <div class="d-flex flex-column">
        <textarea name="description" placeholder="Deskripsi" cols="30" rows="10" style="margin-top: 10px"></textarea>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
        <button type="submit" style="border-radius:8px; width: 230px; margin-left:29px; margin-bottom:10px; margin-top:10px;">Kirim</button>
    </form>
</div>
    {{-- <form action="/store" method="POST" class="">
        @csrf
        <div class="create-input" style="    margin-top: 20px;
        margin-left: 50px;">
          <span style="    font-weight: 300;
          display: flex;
          justify-content: center;
          margin-left: -100px;">Title</span>
          <input type="text" name="title">
        </div>
        <div class="create-input"  style="    margin-top: 20px;
        margin-left: 50px;">
          <span style="    font-weight: 300;
          display: flex;
          justify-content: center;
          margin-left: -100px;           display: flex;
          justify-content: center;
          margin-left: -100px;">date</span>
      <input type="date" name="date">
        </div>
      <div class="create-input"  style="    margin-top: 20px;
      margin-left: 50px;           display: flex;
          justify-content: center;
          margin-left: -100px;">
          <span style="    font-weight: 300;
          display: flex;
          justify-content: center;
          margin-left: -100px;">description</span>
      <textarea class="create-input" name="description" cols="30" rows="10" style="          display: flex;
      justify-content: center;
      margin-left: -100px;"></textarea>
      </div>
      <button class="create-button"  type="submit" style="    width: 230px;
      border-radius: 10px;
      margin-left: 50px;">Kirim</button>
      </div>
      </form> --}}
@endsection