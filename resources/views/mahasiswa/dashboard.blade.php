@extends('layouts.f-app')
@section('konten')
<div class="container" v-if="! loading">
    <div class="row" v-if="actions.length > 0">
        <div class="col-md-12">
            <div class="alert alert-warning">
                <p>Aplikasi sedang dalam <strong>Mode Offline</strong>, ada @{{ actions.length }} aksi yang harus disinkronisasi.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <router-view></router-view>        
    </div>
</div>
@endsection