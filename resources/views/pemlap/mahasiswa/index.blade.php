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
	            				<th class="text-center">NPM</th>
	            				<th class="text-center">Nama</th>
	            				<th class="text-center">Email</th>
	            				<th class="text-center">Alamat</th>
	            				<th class="text-center">Tanggal Lahir</th>
	            				<th class="text-center">No Hp</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			@foreach ($mhs as $no=>$m)
	            			<tr>
	            				<td class="text-center">{{ $no+1 }}</td>
	            				<td class="text-center">{{ $m->npm }}</td>
	            				<td class="text-center">{{ $m->nama }}</td>
	            				<td class="text-center">{{ $m->email }}</td>
	            				<td class="text-center">{{ $m->alamat }}</td>
	            				<td class="text-center">{{ $m->tgl_lahir }}</td>
	            				<td class="text-center">{{ $m->no_hp }}</td>
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