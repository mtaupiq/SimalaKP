@extends('layouts.a-app')
@section('konten')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Lihat Data Mahasiswa {{$mhs->nama}}</h3>
                </div>
                <div class="panel-body">
                	<table class="table table-hover" style="margin-bottom: 0px;">
                		<tbody>
                			<tr>
                				<th>NPM</th>
                				<th>:</th>
                				<td>{{$mhs->npm}}</td>
                			</tr>
                			<tr>
                				<th>Nama</th>
                				<th>:</th>
                				<td>{{$mhs->nama}}</td>
                			</tr>
                			<tr>
                				<th>Email</th>
                				<th>:</th>
                				<td>{{$mhs->email}}</td>
                			</tr>
                			<tr>
                				<th>Tanggal Lahir</th>
                				<th>:</th>
                				<td>{{$mhs->tgl_lahir}}</td>
                			</tr>
                			<tr>
                				<th>Alamat</th>
                				<th>:</th>
                				<td>{{$mhs->alamat}}</td>
                			</tr>
                			<tr>
                				<th>No Hp</th>
                				<th>:</th>
                				<td>{{$mhs->no_hp}}</td>
                			</tr>
                			<tr>
                				<th style="vertical-align: middle;">Dosen Pembimbing</th>
                				<th>:</th>
                				<td>
                					<table class="table" style="margin-bottom: 0px;">
                						<tbody>
                							<tr>
			            						<td width="100px">NIDN</td>
			            						<td width="10px">:</td>
			            						<td>{{$mhs->dospem->nidn}}</td>
			            					</tr>
			            					<tr>
			            						<td>Nama</td>
			            						<td>:</td>
			            						<td>{{$mhs->dospem->nama}}</td>
			            					</tr>
			            					<tr>
			            						<td>No Hp</td>
			            						<td>:</td>
			            						<td>{{$mhs->dospem->no_hp}}</td>
			            					</tr>
                						</tbody>
                					</table>
                				</td>
                			</tr>
                			<tr>
                				<th style="vertical-align: middle;">Pembimbing Lapangan</th>
                				<th>:</th>
                				<td>
                					<table class="table" style="margin-bottom: 0px;">
                						<tbody>
                							<tr>
			            						<td width="100px">NIP</td>
			            						<td width="10px">:</td>
			            						<td>{{$mhs->pemlap->nip}}</td>
			            					</tr>
			            					<tr>
			            						<td>Nama</td>
			            						<td>:</td>
			            						<td>{{$mhs->pemlap->nama}}</td>
			            					</tr>
			            					<tr>
			            						<td>Jabatan</td>
			            						<td>:</td>
			            						<td>{{$mhs->pemlap->jabatan}}</td>
			            					</tr>
			            					<tr>
			            						<td>No Hp</td>
			            						<td>:</td>
			            						<td>{{$mhs->pemlap->no_hp}}</td>
			            					</tr>
                						</tbody>
                					</table>
                				</td>
                			</tr>
                			<tr>
                				<th style="vertical-align: middle;">Instansi</th>
                				<th>:</th>
                				<td>
                					<table class="table" style="margin-bottom: 0px;">
                						<tbody>
                							<tr>
			            						<td width="100px">Nama</td>
			            						<td width="10px">:</td>
			            						<td>{{$mhs->instansi->nama}}</td>
			            					</tr>
			            					<tr>
			            						<td>Alamat</td>
			            						<td>:</td>
			            						<td>{{$mhs->instansi->alamat}}</td>
			            					</tr>
			            					<tr>
			            						<td>No Telepon</td>
			            						<td>:</td>
			            						<td>{{$mhs->instansi->no_tlp}}</td>
			            					</tr>
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