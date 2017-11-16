<template>
    <div>
        <p v-if="loading" class="text-muted text-center">
            Loading...
        </p>
        <div v-else class="row">
            <p v-if="laporans.length == 0" class="text-muted text-center">Database Kosong!!.</p>
            <div class="col-sm-6 col-md-4" v-for="laporan in laporans">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img :src="laporan.foto" class="img-responsive" alt="Foto Kegiatan">
                        <table class="table table-hover" style="margin-bottom: 0px;">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5>{{ laporan.judul }} <small class="text-success"><span v-if="laporan.verified_by_dp && laporan.verified_by_pl == 1" class="glyphicon glyphicon-ok" aria-hidden="true"></span></small></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <small class="text-primary">{{ laporan.created_at | moment("dddd, DD MMMM YYYY, h:mm:ss a") }}</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ laporan.deskripsi }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <p class="text-center" style="margin-bottom: 0px;">
                            <router-link class="btn btn-sm btn-primary" :to="'/laporan/' + laporan.id">
                                <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>&nbsp;Lihat
                            </router-link>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['laporans'],

        computed: {
            loading() {
                return this.laporans == null;
            }
        }
    }
</script>