@extends('layout')
@section('content')

{{-- atribut value berfungsi untuk menampilkan data di inputnya. data yang ditampilin merupakan data yang diambil di controller dan dikirim lewat compct --}}
{{-- kenapa textarea gapunya attribute value? karena textarea bikan termasuk tag input/select dan dia punya penutup teg, jadi buat nampilinnya langsung tanpa attribute value (sebelum penutup text area) --}}
{{-- <form action="/update/{{$todo['id']}}" method="POST">
    @csrf --}}
    {{-- mengirim data ke controller yang ditampung oelh request $request --}}
    {{-- akrena attribute method pada tag form cuman bisa GET/POST sedangkan buat update data itu pake method patch jadi method post di form di timpa sama method patch ini --}}
    {{-- @method('PATCH')
    @if ($errors->any())
    <div class="alert alert danger">
        <ul>
            @foreach ($errors->all as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <input type="text" name="title">
    @error('title')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <input type="date" name="date">
    @error('date')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <textarea name="description" cols="30" rows="10"></textarea>
    @error('description')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <button type="submit">Kirim</button>
</form> --}}

<div class="card" style="width: 300px; box-shadow: 0px 1px 400px -14px rgba(255, 123, 0, 0.75);
-webkit-box-shadow: 0px 1px 400px -14px rgba(255, 115, 0, 0.75);
-moz-box-shadow: 0px 1px 400px -14px rgba(0,0,0,0.75); margin-left: 16cm; margin-top:75px; border-radius:10px;">
    <h3 style="font-weight:100; margin-left:80px; margin-top:10px;">Edit disini</h3>
    <form action="/update/{{$todo['id']}}" method="POST" style="padding: 10px">
        @csrf
        @method('PATCH')
        @if ($errors->any())
        <div class="alert alert danger">
            <ul>
                @foreach ($errors->all as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="d-flex flex-column">
        <input type="text" name="title" placeholder="edit judul">
        @error('title')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="d-flex flex-column">
        <input type="date" name="date" placeholder="edit tanggal" style="margin-top: 10px">
        @error('date')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
        <div class="d-flex flex-column">
        <textarea name="description" placeholder="edit deskripsi" cols="30" rows="10" style="margin-top: 10px"></textarea>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
        <button type="submit" style="border-radius:8px; width: 230px; margin-left:29px; margin-bottom:10px; margin-top:10px;">Kirim</button>
    </form>
</div>
@endsection