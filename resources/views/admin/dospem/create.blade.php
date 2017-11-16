@extends('layouts.a-app')
@section('konten')
<div class="container">
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<form class="form-horizontal" role="form" method="POST" action="{{ route('dospem.store') }}">
                {{ csrf_field() }}
		        <div class="panel panel-primary">
		        	<div class="panel-heading">
	                    <h3 class="panel-title">Tambah Data Dosen Pembimbing</h3>
	                </div>
		            <div class="panel-body">

	                    <div class="form-group{{ $errors->has('nidn') ? ' has-error' : '' }}">
	                        <label for="nidn" class="col-md-4 control-label">NIDN</label>

	                        <div class="col-md-6">
	                            <input id="nidn" type="text" class="form-control" name="nidn" value="{{ old('nidn') }}" required autofocus>

	                            @if ($errors->has('nidn'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('nidn') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
	                        <label for="nama" class="col-md-4 control-label">Nama</label>

	                        <div class="col-md-6">
	                            <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>

	                            @if ($errors->has('nama'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('nama') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                        <label for="email" class="col-md-4 control-label">E-Mail</label>

	                        <div class="col-md-6">
	                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

	                            @if ($errors->has('email'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('email') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                        <label for="password" class="col-md-4 control-label">Password</label>

	                        <div class="col-md-6">
	                            <input id="password" type="password" class="form-control" name="password" required>

	                            @if ($errors->has('password'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('password') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>


	                    <div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
	                        <label for="no_hp" class="col-md-4 control-label">No Hp</label>

	                        <div class="col-md-6">
	                            <input id="no_hp" type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}" required autofocus>

	                            @if ($errors->has('no_hp'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('no_hp') }}</strong>
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
	                            <a class="btn btn-default" href="{{route('dospem.index')}}" role="button">Batal</a>
	                        </div>
		            	</div>
		            </div>
		        </div>
			</form>
    	</div>
    </div>
</div>
@endsection