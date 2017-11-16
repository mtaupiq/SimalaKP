@extends('layouts.p-app')
@section('konten')
<div class="container">
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    		@if(Session::has('message'))
    		<div class="alert alert-success alert-dismissible">
    			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    			<strong>Success!</strong> {!! session('message') !!}
    		</div>
    		@endif
	        <div class="panel panel-primary">
	        	<div class="panel-heading">
                    <h3 class="panel-title">Data Mahasiswa Bimbingan</h3>
                </div>
	            <div class="panel-body">
	            	<table class="table table-hover table-responsive" style="margin-bottom: 0px;">
	            		<thead>
	            			<tr>
	            				<th class="text-center">No</th>
	            				<th class="text-center">Nama</th>
	            				<th class="text-center">Laporan Kegiatan</th>
	            				<th class="text-center">Tempat KP</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			@foreach ($laporan as $no=>$m)
	            			<tr>
	            				<td class="text-center" style="vertical-align: middle;">{{ $no+1 }}</td>
	            				<td class="text-center" style="vertical-align: middle;">{{ $m->nama }}</td>
	            				<td class="text-center">
	            					<table class="table table-striped table-hover">
	            						<thead>
	            							<tr>
	            								<th class="text-center">No</th>
	            								<th class="text-center">Judul</th>
	            								<th class="text-center">Tanggal</th>
	            								<th class="text-center">Deskripsi</th>
	            								<th class="text-center">Konfirmasi</th>
	            								<th class="text-center">Aksi</th>
	            							</tr>
	            						</thead>
	            						<tbody>
	            							@foreach($m->laporan as $no=>$l)
	            							<tr>
	            								<td>{{$no+1}}</td>
	            								<td>{{$l->judul}}</td>
	            								<td>{{$l->created_at->format('d-m-Y')}}</td>
	            								<td>{{$l->deskripsi}}</td>
	            								<td>
	            									@if($l->verified_by_pl == 1)
	            									<span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
	            									@else
	            									<span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>
	            									@endif
	            								</td>
	            								<td class="text-center" style="vertical-align: middle;">
	            									<a class="btn btn-xs btn-primary" href="{{route('laporanpl.show', $l->id)}}" role="button"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>
	            								</td>
	            							</tr>
	            							@endforeach
	            						</tbody>
	            					</table>
	            				</td>
	            				<td class="text-center" style="vertical-align: middle;">{{$m->instansi->nama}}</td>
	            			</tr>
				            @endforeach
	            		</tbody>
	            	</table>
	            </div>
	        </div>
    	</div>
    </div>
</div>
@endsection