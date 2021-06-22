<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Buku;
use App\Models\Member;
use Livewire\WithPagination;


class Bukus extends Component
{
    use WithPagination;

    public $bukus, $name_bk, $udul, $penulis, $tahun, $buku_id, $search;
    public $isModal = 0;
    public $paginate = 5;

  	//FUNGSI INI UNTUK ME-LOAD VIEW YANG AKAN MENJADI TAMPILAN HALAMAN MEMBER
    public function render()
    // {
    //     {
    //         return view('livewire.bukus', [
    //             $bukus=> Buku::all(),
    //             'bukus'=>$this->search == null ?
    //             Buku::latest()->paginate($this->paginate) : 
    //             Buku::where('name_bk', 'like', '%'.$this->search.'%')->paginate($this->paginate)
    //         ]);
    //     }
    // }


    {
        $this->bukus = Buku::orderBy('created_at', 'DESC')->get(); //MEMBUAT QUERY UNTUK MENGAMBIL DATA
        return view('livewire.bukus'); //LOAD VIEW BUKUS.BLADE.PHP YG ADA DI DALAM FOLDER /RESOURSCES/VIEWS/LIVEWIRE
    }
    
    //FUNGSI INI AKAN DIPANGGIL KETIKA TOMBOL TAMBAH ANGGOTA DITEKAN
    public function create1()
    {
        //KEMUDIAN DI DALAMNYA KITA MENJALANKAN FUNGSI UNTUK MENGOSONGKAN FIELD
        $this->resetFields();
        //DAN MEMBUKA MODAL
        $this->openModal();
    }

    //FUNGSI INI UNTUK MENUTUP MODAL DIMANA VARIABLE ISMODAL KITA SET JADI FALSE
    public function closeModal()
    {
        $this->isModal = false;
    }

    //FUNGSI INI DIGUNAKAN UNTUK MEMBUKA MODAL
    public function openModal()
    {
        $this->isModal = true;
    }

    //FUNGSI INI UNTUK ME-RESET FIELD/KOLOM, SESUAIKAN FIELD APA SAJA YANG KAMU MILIKI
    public function resetFields()
    {
        $this->name_bk = '';
        $this->judul = '';
        $this->penulis = '';
        $this->tahun = '';
        $this->buku_id = '';
    }

    //METHOD STORE AKAN MENG-HANDLE FUNGSI UNTUK MENYIMPAN / UPDATE DATA
    public function store()
    {
        //MEMBUAT VALIDASI
        $this->validate([
            'name_bk' => 'required|string',
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'tahun' => 'required'
        ]);

        //QUERY UNTUK MENYIMPAN / MEMPERBAHARUI DATA MENGGUNAKAN UPDATEORCREATE
        //DIMANA ID MENJADI UNIQUE ID, JIKA IDNYA TERSEDIA, MAKA UPDATE DATANYA
        //JIKA TIDAK, MAKA TAMBAHKAN DATA BARU
        Buku::updateOrCreate(['id' => $this->buku_id], [
            'name_bk' => $this->name_bk,
            'judul' => $this->judul,
            'penulis' => $this->penulis,
            'tahun' => $this->tahun,
        ]);

        //BUAT FLASH SESSION UNTUK MENAMPILKAN ALERT NOTIFIKASI
        session()->flash('message', $this->buku_id ? $this->name_bk . ' Diperbaharui' : $this->name_bk . ' Ditambahkan');
        $this->closeModal(); //TUTUP MODAL
        $this->resetFields(); //DAN BERSIHKAN FIELD
    }

    //FUNGSI INI UNTUK MENGAMBIL DATA DARI DATABASE BERDASARKAN ID BUKU
    public function edit($id)
    {
        $buku = BUku::find($id); //BUAT QUERY UTK PENGAMBILAN DATA
        //LALU ASSIGN KE DALAM MASING-MASING PROPERTI DATANYA
        $this->buku_id = $id;
        $this->name_bk = $buku->name_bk;
        $this->judul = $buku->judul;
        $this->penulis = $buku->penulis;
        $this->tahun = $buku->tahun;

        $this->openModal(); //LALU BUKA MODAL
    }

    //FUNGSI INI UNTUK MENGHAPUS DATA
    public function delete($id)
    {
        $buku = BUku::find($id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        $buku->delete(); //LALU HAPUS DATA
        session()->flash('message', $buku->name_bk . ' Dihapus'); //DAN BUAT FLASH MESSAGE UNTUK NOTIFIKASI
    }

}
