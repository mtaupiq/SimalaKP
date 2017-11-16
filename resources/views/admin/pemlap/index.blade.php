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
                    <h3 class="panel-title">Data Pembimbing Lapangan</h3>
                </div>
	        	<div class="panel-footer">
	        		<a class="btn btn-primary" href="{{route('pemlap.create')}}" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Tambah</a>
	        	</div>
	            <div class="panel-body">
	            	<table class="table table-hover table-responsive" style="margin-bottom: 0px;">
	            		<thead>
	            			<tr>
	            				<th class="text-center">No</th>
	            				<th class="text-center">NIP</th>
	            				<th class="text-center">Nama</th>
	            				<th class="text-center">Email</th>
	            				<th class="text-center">No Hp</th>
	            				<th class="text-center">Jabatan</th>
	            				<th class="text-center">Aksi</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			@foreach ($pemlap as $no=>$p)
	            			<tr>
	            				<td class="text-center">{{ $no+1 }}</td>
	            				<td class="text-center">{{ $p->nip }}</td>
	            				<td class="text-center">{{ $p->nama }}</td>
	            				<td class="text-center">{{ $p->email }}</td>
	            				<td class="text-center">{{ $p->jabatan }}</td>
	            				<td class="text-center">{{ $p->no_hp }}</td>
	            				<td class="text-center">
            						<form action="{{route('pemlap.destroy', $p->id)}}" method="POST">
            							{{csrf_field()}}
		            					<div class="btn-group" role="group" aria-label="...">
		            						<a href="{{route('pemlap.show', $p->id)}}" role="button" class="btn btn-sm btn-primary">
		            							<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
		            						</a>
		            						<a href="{{route('pemlap.edit', $p->id)}}" role="button" class="btn btn-sm btn-warning">
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