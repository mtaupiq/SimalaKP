@extends('layouts.a-app')
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
                    <h3 class="panel-title">Data Mahasiswa</h3>
                </div>
	        	<div class="panel-footer">
	        		<a class="btn btn-primary" href="{{route('mahasiswa.create')}}" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Tambah</a>
	        	</div>
	            <div class="panel-body">
	            	<table class="table table-hover table-responsive" style="margin-bottom: 0px;">
	            		<thead>
	            			<tr>
	            				<th class="text-center">No</th>
	            				<th class="text-center">NPM</th>
	            				<th class="text-center">Nama</th>
	            				<th class="text-center">Email</th>
	            				<th class="text-center">Aksi</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			@foreach ($mhs as $no=>$m)
	            			<tr>
	            				<td class="text-center">{{ $no+1 }}</td>
	            				<td class="text-center">{{ $m->npm }}</td>
	            				<td class="text-center">{{ $m->nama }}</td>
	            				<td class="text-center">{{ $m->email }}</td>
	            				<td class="text-center">
            						<form action="{{route('mahasiswa.destroy', $m->id)}}" method="POST">
            							{{csrf_field()}}
		            					<div class="btn-group" role="group" aria-label="...">
		            						<a href="{{route('mahasiswa.show', $m->id)}}" role="button" class="btn btn-sm btn-primary">
		            							<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
		            						</a>
		            						<a href="{{route('mahasiswa.edit', $m->id)}}" role="button" class="btn btn-sm btn-warning">
		            							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		            						</a>
	            							<input type="hidden" name="_method" value="delete">
		            						<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
		            							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		            						</button>
		            					</div>
            						</form>
	            				</td>
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