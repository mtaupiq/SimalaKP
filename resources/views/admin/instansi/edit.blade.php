@extends('layouts.a-app')
@section('konten')
<div class="container">
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<form class="form-horizontal" role="form" method="POST" action="{{ route('instansi.update', $instansi->id) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
		        <div class="panel panel-primary">
		        	<div class="panel-heading">
	                    <h3 class="panel-title">Ubah Data Instansi {{ $instansi->nama }}</h3>
	                </div>
		            <div class="panel-body">

	                    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
	                        <label for="nama" class="col-md-4 control-label">Nama</label>

	                        <div class="col-md-6">
	                            <input id="nama" type="text" class="form-control" name="nama" value="{{ $instansi->nama }}" required autofocus>

	                            @if ($errors->has('nama'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('nama') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
	                        <label for="alamat" class="col-md-4 control-label">Alamat</label>

	                        <div class="col-md-6">
	                            <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $instansi->alamat }}" required autofocus>

	                            @if ($errors->has('alamat'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('alamat') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>


	                    <div class="form-group{{ $errors->has('no_tlp') ? ' has-error' : '' }}">
	                        <label for="no_tlp" class="col-md-4 control-label">No Telpon</label>

	                        <div class="col-md-6">
	                            <input id="no_tlp" type="text" class="form-control" name="no_tlp" value="{{ $instansi->no_tlp }}" required autofocus>

	                            @if ($errors->has('no_tlp'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('no_tlp') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
		            </div>
		            <div class="panel-footer">
		            	<div class="row">
	                        <div class="col-md-6 col-md-offset-4">
	                            <button type="submit" class="btn btn-primary">
	                                Simpan
	                            </button>
	                            <a class="btn btn-default" href="{{route('instansi.index')}}" role="button">Batal</a>
	                        </div>
		            	</div>
		            </div>
		        </div>
			</form>
    	</div>
    </div>
</div>
@endsection