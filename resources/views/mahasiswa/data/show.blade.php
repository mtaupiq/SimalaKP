@extends('layouts.f-app')
@section('konten')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Status Mahasiswa</h3>
				</div>
				<div class="panel-body">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Data Mahasiswa</h3>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-md-4 control-label">NPM</label>
									<div class="col-md-6">
										<input type="text" class="form-control" value="{{ $mhs->npm }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Nama</label>
									<div class="col-md-6">
										<input type="text" class="form-control" value="{{ $mhs->nama }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">E-Mail</label>
									<div class="col-md-6">
										<input type="email" class="form-control" name="email" value="{{ $mhs->email }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Tanggal Lahir</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="tgl_lahir" value="{{ $mhs->tgl_lahir }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Alamat</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="alamat" value="{{ $mhs->alamat }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">No Hp</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="no_hp" value="{{ $mhs->no_hp }}" disabled>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Data Dosen Pembimbing</h3>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-md-4 control-label">NIDN</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="no_hp" value="{{ $mhs->dospem->nidn }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Nama</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="no_hp" value="{{ $mhs->dospem->nama }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">No Hp</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="no_hp" value="{{ $mhs->dospem->no_hp }}" disabled>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Data Pembimbing Lapangan</h3>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-md-4 control-label">NIP</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="no_hp" value="{{ $mhs->pemlap->nip }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Nama</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="no_hp" value="{{ $mhs->pemlap->nama }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Jabatan</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="no_hp" value="{{ $mhs->pemlap->jabatan }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">No Hp</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="no_hp" value="{{ $mhs->pemlap->no_hp }}" disabled>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Data Instansi</h3>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-md-4 control-label">Nama</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="no_hp" value="{{ $mhs->instansi->nama }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Alamat</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="no_hp" value="{{ $mhs->instansi->alamat }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">No Telepon</label>
									<div class="col-md-6">
										<input type="text" class="form-control" name="no_hp" value="{{ $mhs->instansi->no_tlp }}" disabled>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="panel-footer text-center">
					<a class="btn btn-default" href="{{route('data_mahasiswa.index')}}" role="button"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>&nbsp;Kembali</a>
					<a class="btn btn-warning" href="{{route('data_mahasiswa.edit', $mhs->id)}}" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Ubah</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection