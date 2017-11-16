@extends('layouts.f-app')
@section('konten')
<div class="container">
    <div class="row">
    	<div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
    		<form class="form-horizontal" role="form" method="POST" action="{{ route('data_mahasiswa.update', $mhs->id) }}">
    			{{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
		        <div class="panel panel-primary">
		        	<div class="panel-heading">
	                    <h3 class="panel-title">Ubah Data Mahasiswa</h3>
	                </div>
		            <div class="panel-body">
	                    <div class="form-group{{ $errors->has('npm') ? ' has-error' : '' }}">
	                        <label for="npm" class="col-md-4 control-label">NPM</label>

	                        <div class="col-md-6">
	                            <input id="npm" type="text" class="form-control" name="npm" value="{{ $mhs->npm }}" required>

	                            @if ($errors->has('npm'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('npm') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
	                        <label for="nama" class="col-md-4 control-label">Nama</label>

	                        <div class="col-md-6">
	                            <input id="nama" type="text" class="form-control" name="nama" value="{{ $mhs->nama }}" required autofocus>

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
	                            <input id="email" type="email" class="form-control" name="email" value="{{ $mhs->email }}" required>

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

	                    <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
	                        <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label>

	                        <div class="col-md-6">
	                            <input id="tgl_lahir" type="text" class="form-control" name="tgl_lahir" value="{{ $mhs->tgl_lahir }}" required autofocus>

	                            @if ($errors->has('tgl_lahir'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('tgl_lahir') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
	                        <label for="alamat" class="col-md-4 control-label">Alamat</label>

	                        <div class="col-md-6">
	                            <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $mhs->alamat }}" required autofocus>

	                            @if ($errors->has('alamat'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('alamat') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
	                        <label for="no_hp" class="col-md-4 control-label">No Hp</label>

	                        <div class="col-md-6">
	                            <input id="no_hp" type="text" class="form-control" name="no_hp" value="{{ $mhs->no_hp }}" required autofocus>

	                            @if ($errors->has('no_hp'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('no_hp') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('dosen_pembimbing_id') ? ' has-error' : '' }}">
	                        <label for="dosen_pembimbing_id" class="col-md-4 control-label">Dosen Pembimbing</label>

	                        <div class="col-md-6">
	                        	<select name="dosen_pembimbing_id" id="input" class="form-control" required>
	                        		<option value="">-- Pilih --</option>
	                        		@foreach ($dospem as $id=>$nama)
	                        		<option value="{{$id}}">{{$nama}}</option>
	                        		@endforeach
	                        	</select>

	                            @if ($errors->has('dosen_pembimbing_id'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('dosen_pembimbing_id') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('pembimbing_lapangan_id') ? ' has-error' : '' }}">
	                        <label for="pembimbing_lapangan_id" class="col-md-4 control-label">Pembimbing Lapangan</label>

	                        <div class="col-md-6">
	                        	<select name="pembimbing_lapangan_id" id="input" class="form-control" required>
	                        		<option value="">-- Pilih --</option>
	                        		@foreach ($pemlap as $id=>$nama)
	                        		<option value="{{$id}}">{{$nama}}</option>
	                        		@endforeach
	                        	</select>

	                            @if ($errors->has('pembimbing_lapangan_id'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('pembimbing_lapangan_id') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('instansi_id') ? ' has-error' : '' }}">
	                        <label for="instansi_id" class="col-md-4 control-label">Instansi</label>

	                        <div class="col-md-6">
	                        	<select name="instansi_id" id="input" class="form-control" required>
	                        		<option value="">-- Pilih --</option>
	                        		@foreach ($instansi as $id=>$nama)
	                        		<option value="{{$id}}">{{$nama}}</option>
	                        		@endforeach
	                        	</select>

	                            @if ($errors->has('instansi_id'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('instansi_id') }}</strong>
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
	                            <a class="btn btn-default" href="{{route('data_mahasiswa.index')}}" role="button">Batal</a>
	                        </div>
		            	</div>
		            </div>
		        </div>
			</form>
    	</div>
    </div>
</div>
@endsection