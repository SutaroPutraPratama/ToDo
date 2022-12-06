<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //untuk menampilkan halaman awal dan semua data
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function dashboard(){
        return view('dashboard');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan halaman form input tambah data
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk mengirimkan data baru ke database
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required'

        //'' = nama column
        // request $request-> = value name di input
        // kenapa kirim 5 data padahal di input ada 3 inputan? kalau dicek di table todos kan ada 6 column yang harus diisi, salah satunya column_date yang nullable
        //user_id ngambil id dari fitur auth(history login), agar tau itu todo puny siapa 
        //column status kan boolean, jadi status kalo belum ngerjain = 0
        ]);
        //kirim data ke database yang table todos : model Todo
        Todo::create([
        'title' => $request->title,
        'date' => $request->date,
        'description' => $request->description,
        'user_id' => Auth::user()->id,
        'status' => 0,
        ]);
        //kalau berhasil ditambah ke db maka akan diarahkan kembali ke dashboard dengan menampilkan pemberitahuan 
        return redirect('/data')->with('berhasih menambahkan data todo!');

    }
    public function data()
{
    //ambil data dari tabel todos
    $todos = Todo::all();
    //compact untuk mengirim data ke blade, isi compact sama dengan variabelnya
    return view('data', compact('todos'));
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //menampilkan satu data spesifik
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan halaman input form buat edit 
        //parameter $id mengambil path dinamis {id}
        //ambil satu baris dat ayang memiliki value column id sama dengan data path dinamis id yang dikirim ke route
        $todo = Todo::where('id', $id)->first();
        //kemudian arahkan/tampilkan file view yang bernama edit.blade.php dan kirim data dari $todo ke file edit tersebut dengan banutan compact
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mengupdate data di database
        //validasi data
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required']);
            //cari baris data yang punya value column id sama dengan id yang dikirim ke route

            Todo::where('id', $id)->update([
                'title' => $request->title,
                'date' => $request->date,
                'description' => $request->description,
                'user_id' => Auth::user()->id,
                'status' => 0,
            ]);
            //kalau berhasil diarahkan ke halaman data dengan pemberitahuan ini
            return redirect('/data')->with('successUpdate', 'Berhasil Mengubah Data');

        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //untuk menghapus data di database
        //cari data yang mau dihapus, kalo ketemu langsung hapus datanya
        Todo::where('id', $id)->delete();


        //kalau berhasil arahin balik ke halaman data dengan pemberitahuan
        return redirect('/data')->with('succesDelete', 'Berhasil menghapus data');
    }

    public function updateToComplate(Request $request, $id){
        //cari data yag akan di update
        //setelah itu data baru akan di update ke database melalui model
        //status tipenya boolean (0/1) : 0 (on-proccess) 1 (complated)
        //carboon package laravel yang akan mengelola sega;a hal yang berhubungan dengan date
        //now() : mengambil tanggal hari ini
        Todo::where('id', '=', $id)->update([
            'status' => 1,
            'done_time' => \Carbon\Carbon::now(),
        ]);
        //jika berhasil maka akan dikembalikan ke halaman awal (halaman tempat button complated berbeda) : mengambil tanggal hari ini
        return redirect()->back()->with('done', 'Todo sudah selesai dikerjakan');
    }
}




