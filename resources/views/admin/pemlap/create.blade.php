@extends('layouts.a-app')
@section('konten')
<div class="container">
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<form class="form-horizontal" role="form" method="POST" action="{{ route('pemlap.store') }}">
                {{ csrf_field() }}
		        <div class="panel panel-primary">
		        	<div class="panel-heading">
	                    <h3 class="panel-title">Tambah Data Pembimbing Lapangan</h3>
	                </div>
		            <div class="panel-body">

	                    <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
	                        <label for="nip" class="col-md-4 control-label">NIP</label>

	                        <div class="col-md-6">
	                            <input id="nip" type="text" class="form-control" name="nip" value="{{ old('nip') }}" required autofocus>

	                            @if ($errors->has('nip'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('nip') }}</strong>
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

	                    <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
	                        <label for="jabatan" class="col-md-4 control-label">Jabatan</label>

	                        <div class="col-md-6">
	                            <input id="jabatan" type="text" class="form-control" name="jabatan" value="{{ old('jabatan') }}" required autofocus>

	                            @if ($errors->has('jabatan'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('jabatan') }}</strong>
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