@extends('layouts.default')
@section('content')
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
    	<h2>Panduan Anotasi 5W1H</h2>
    	<ol>
    		<li>Tugas anda adalah membaca berita pada kolom sebelah kiri.</li>
    		<li>Selanjutnya ketik informasi 5w1h pada form sebelah kanan.</li>
    		<li>Harap ketik informasi sesuai berita, tidak disingkat. Jika info berbentuk kalimat, tak boleh ada loncat kata.</li>
    		<li>Setelah selesai mengisi akan muncul highlight pada paragraf berita.</li>
    		<li>Jika highlight tidak muncul, harap ulangi sampai muncul.</li>
    		<li>Form dikosongkan apabila dianggap tidak ditemukan adanya informasi.</li>
    		<li><a href='{{url("article/list")}}'>Mulai</a></li>
    	</ol>
    </div>
    <div class="col-sm-1"></div>
@stop