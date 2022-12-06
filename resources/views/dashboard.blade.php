@extends('public.layout.dashboard')

@section('body')
{{-- <a href="{{route('logout')}}">logout</a> --}}

<div class="awal" style="margin-top:150px; font-size: 30px; margin-left:200px">
{{auth()->user()->username}}
<br>
{{auth()->user()->email}}
<p>selamat datang di dashboard</p>
</div>
@if (Session::get('berhasih menambahkan data todo!'))
<div class="alert alert-success">
    {{ Session::get('berhasih menambahkan data todo!') }}
</div>
@endif


@if(session('isGuest'))
<h2>
    <b>
        <i>
            {{session('isGuest')}}
        </i>
    </b>
</h2>
@endif

@endsection