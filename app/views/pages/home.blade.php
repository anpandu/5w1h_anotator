@extends('layouts.default')
@section('content')
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
    	<h2>Panduan Anotasi 5W1H</h2>
    	<ol>
            <li>Tugas anda adalah membaca berita pada kolom sebelah kiri dan mengisi informasi 5w1h.</li>
    		<li>Untuk mengisi form 5w1h dengan kata/kalimat di paragraf, klik karakter pertama lalu klik karakter terakhir pada kata/kalimat yang diinginkan pada paragraf.</li>
            <li><img src='/images/panduananotasi.png'></li>
            <li>Akan keluar pop-up di depan form dan ada enam tombol: what, who, when, where, dan how.</li>
            <li>Klik salah satu tombol untuk mengisi form yang sesuai.</li>
            <li>Jika tidak menemukan info 5w1h boleh dikosongkan.</li>
            <li>N.B. : mengisi form dengan ketik manual tidak dianjurkan.</li>
    		<li><a href='{{url("article/list")}}'>Mulai</a></li>
    	</ol>
    </div>
    <div class="col-sm-1"></div>
@stop