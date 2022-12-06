@extends('layout')

@section('content')
@if (session('succesUpdate'))
<div class="alert alert-succes">
    {{session('succesUpdate')}}
</div>    
@endif
@if (Session::get('succesDelete'))
<div class="alert alert-success">
    {{ Session::get('succesDelete') }}
</div>
@endif
    <table class="table table-succsess table-striped table-bordered">
        <tr>
            <td>No</td>
            <td>Kegiatan</td>
            <td>Deskripsi</td>
            <td>Batas Waktu</td>
            <td>Status</td>
            <td>Aksi</td>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach  ($todos as $todo)
        <tr>
            {{-- tiap looping, $no bakal ditambah 1 --}}
            <td>{{ $no++ }}</td>
            <td>{{ $todo['title'] }}</td>
            <td>{{ $todo['description'] }}</td>
            {{-- carbon package date pada laravel , nantinya si date yang 2022-11-22 formatnya jadi 22 November, 2022 --}}
            <td>{{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y') }}</td>
            {{-- Konsep ternary, if statusnya 1 nampilin teks complated kalo 0 nampilin text on-process . status tuh boolean kan ? cmn antara 1 atau 0 --}}
            <td>{{ $todo['status'] ? 'Complate' : 'On-Process' }}</td>
            <td style="display:flex; gap:2px;">
                <a href="/edit/{{$todo['id']}}" style="align-items: center " class="btn btn-success">Edit</a> 
                {{-- fitur delete harus menggunakan form lagi, tombol hapunya disimpan di tag button type submit, kenapa pake form karena kita kan mau ngubah (hapus) --}}

                <form action="/destroy/{{$todo['id']}}" method="POST">
                    {{-- menimpa method post karena di route nya menggunakan method delete --}}
                @csrf
                @method('DELETE')
                <button type="submit" style="" class="btn btn-success">Hapus</button>
                </form>
                @if ($todo['status'] == 0)
                <form action="/complate/{{$todo['id']}}" method="POST">
                   @csrf
                   @method('PATCH')
                   <button type="submit" class="btn btn-success">Complated</button>
                </form>                    
                @endif
            </td>
        </tr>
            
        @endforeach

    </table>
@endsection