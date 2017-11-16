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
                    <h3 class="panel-title">Data Dosen Pembimbing</h3>
                </div>
	        	<div class="panel-footer">
	        		<a class="btn btn-primary" href="{{route('dospem.create')}}" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Tambah</a>
	        	</div>
	            <div class="panel-body">
	            	<table class="table table-hover table-responsive" style="margin-bottom: 0px;">
	            		<thead>
	            			<tr>
	            				<th class="text-center">No</th>
	            				<th class="text-center">NIDN</th>
	            				<th class="text-center">Nama</th>
	            				<th class="text-center">Email</th>
	            				<th class="text-center">No Hp</th>
	            				<th class="text-center">Aksi</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			@foreach ($dospem as $no=>$d)
	            			<tr>
	            				<td class="text-center">{{ $no+1 }}</td>
	            				<td class="text-center">{{ $d->nidn }}</td>
	            				<td class="text-center">{{ $d->nama }}</td>
	            				<td class="text-center">{{ $d->email }}</td>
	            				<td class="text-center">{{ $d->no_hp }}</td>
	            				<td class="text-center">
            						<form action="{{route('dospem.destroy', $d->id)}}" method="POST">
            							{{csrf_field()}}
		            					<div class="btn-group" role="group" aria-label="...">
		            						<a href="{{route('dospem.show', $d->id)}}" role="button" class="btn btn-sm btn-primary">
		            							<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
		            						</a>
		            						<a href="{{route('dospem.edit', $d->id)}}" role="button" class="btn btn-sm btn-warning">
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