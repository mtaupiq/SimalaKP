@extends('layouts.d-app')
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
                    <h3 class="panel-title">Konfirmasi Laporan Kegiatan</h3>
                </div>
	            <div class="panel-body">
	            	<table class="table table-hover table-responsive" style="margin-bottom: 0px;">
	            		<tbody>
	            			<tr>
	            				<th>Judul</th>
	            				<th>:</th>
	            				<td>{{$laporan->judul}}</td>
	            			</tr>
	            			<tr>
	            				<th>Waktu</th>
	            				<th>:</th>
	            				<td>{{$laporan->created_at->format('d F Y H:m:s a')}}</td>
	            			</tr>
	            			<tr>
	            				<th>Foto</th>
	            				<th>:</th>
	            				<td>
	            					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            						<a href="{{$laporan->foto}}" class="thumbnail">
	            							<img src="{{$laporan->foto}}" alt="">
	            						</a>
	            					</div>
	            				</td>
	            			</tr>
	            			<tr>
	            				<th>Deskripsi</th>
	            				<th>:</th>
	            				<td>{{$laporan->deskripsi}}</td>
	            			</tr>
	            			<tr>
	            				<th>Konfirmasi</th>
	            				<th>:</th>
	            				<td>
	            					@if($laporan->verified_by_dp == 0)
	            					<form action="{{route('laporandp.update', $laporan->id)}}" method="POST" role="form">
	            						{{csrf_field()}}
	            						<input type="hidden" name="_method" value="PUT">
	            						<input type="hidden" name="konfirmasi" value="1">
		            					<button type="submit" class="btn btn-primary">Konfirmasi</button>
		            				</form>
		            				@else
		            				<form action="{{route('laporandp.update', $laporan->id)}}" method="POST" role="form">
		            					{{csrf_field()}}
		            					<button type="button" class="btn btn-success disabled"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Confirmed</button>
	            						<input type="hidden" name="_method" value="PUT">
	            						<input type="hidden" name="konfirmasi" value="0">
		            					<button type="submit" class="btn btn-primary">Batal</button>
		            				</form>
		            				@endif
		            			</td>
	            			</tr>
	            		</tbody>
	            	</table>
	            </div>
	            <div class="panel-footer">
	            	<a class="btn btn-default" href="{{route('laporandp.index')}}" role="button">Kembali</a>
	            </div>
	        </div>
    	</div>
    </div>
</div>
@endsection