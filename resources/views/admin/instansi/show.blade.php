@extends('layouts.a-app')
@section('konten')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Lihat Data Instansi {{$instansi->nama}}</h3>
                </div>
                <div class="panel-body">
                	<table class="table table-hover" style="margin-bottom: 0px;">
                		<tbody>
                			<tr>
                				<th>Nama</th>
                				<th>:</th>
                				<td>{{$instansi->nama}}</td>
                			</tr>
                			<tr>
                				<th>Alamat</th>
                				<th>:</th>
                				<td>{{$instansi->alamat}}</td>
                			</tr>
                			<tr>
                				<th>No Hp</th>
                				<th>:</th>
                				<td>{{$instansi->no_tlp}}</td>
                			</tr>
                			<tr>
                				<th style="vertical-align: middle;">Mahasiswa Magang</th>
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
                							@foreach($instansi->mahasiswa as $no=>$m)
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
            		<a class="btn btn-default" href="{{route('instansi.index')}}" role="button">Kembali</a>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection