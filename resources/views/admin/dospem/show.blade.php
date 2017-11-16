@extends('layouts.a-app')
@section('konten')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Lihat Data Dosen Pembimbing {{$dospem->nama}}</h3>
                </div>
                <div class="panel-body">
                	<table class="table table-hover" style="margin-bottom: 0px;">
                		<tbody>
                			<tr>
                				<th>NIDN</th>
                				<th>:</th>
                				<td>{{$dospem->nidn}}</td>
                			</tr>
                			<tr>
                				<th>Nama</th>
                				<th>:</th>
                				<td>{{$dospem->nama}}</td>
                			</tr>
                			<tr>
                				<th>Email</th>
                				<th>:</th>
                				<td>{{$dospem->email}}</td>
                			</tr>
                			<tr>
                				<th>No Hp</th>
                				<th>:</th>
                				<td>{{$dospem->no_hp}}</td>
                			</tr>
                			<tr>
                				<th style="vertical-align: middle;">Mahasiswa</th>
                				<th>:</th>
                				<td>
                					<table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NPM</th>
                                                <th>Nama</th>
                                            </tr>
                                        </thead>
                						<tbody>
                							@foreach($dospem->mahasiswa as $no=>$m)
                                            <tr>
                                                <td>{{$no+1}}</td>
                                                <td>{{$m->npm}}</td>
                                                <td>{{$m->nama}}</td>
                                            </tr>
                                            @endforeach
                						</tbody>
                					</table>
                				</td>
                			</tr>

                		</tbody>
                	</table>
                </div>
            	<div class="panel-footer">
            		<a class="btn btn-default" href="{{route('dospem.index')}}" role="button">Kembali</a>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection