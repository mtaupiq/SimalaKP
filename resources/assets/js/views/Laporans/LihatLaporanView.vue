<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p v-if="loading" class="text-muted text-center">
                            Loading...
                        </p>
                        <div v-if="!loading">
                            <img :src="laporan.foto" class="img-responsive" alt="Foto Kegiatan">
                            <table class="table table-hover" style="margin-bottom: 0px;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>{{ laporan.judul }} <small class="text-success"><span v-if="laporan.verified_by_dp && laporan.verified_by_pl == 1" class="glyphicon glyphicon-ok" aria-hidden="true"></span></small></h4>
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
                    </div>
                    <div class="panel-footer text-center">
                        <router-link class="btn btn-sm btn-primary" :to="'/laporan/'">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>&nbsp;Kembali
                        </router-link> 
                        <router-link class="btn btn-sm btn-warning" :to="'/laporan/' + laporan.id + '/edit'">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Edit
                        </router-link> 
                        <button class="btn btn-sm btn-danger" @click="deleteLaporan(laporan)">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            laporan: {},
            loading: true
        };
    },
    created() {
        const id = this.$route.params.id;
        axios.get('laporans/' + id).then(response => {
            this.laporan = response.data
            this.loading = false
        }, error => {
            var dbPromise = IndexedDB.open('SimalaKP-Offline', 3);

            dbPromise.then(function(db) {
              var tx = db.transaction('laporans', 'readonly');
              var store = tx.objectStore('laporans');
              return store.get(Number(id));
            }).then(data => {
              this.laporan = data
              this.loading = false
            });
        });
    },
    methods: {
        deleteLaporan(laporan) {
            Store.laporans.delete(laporan).then(() => {
                this.$emit('delete-laporan', laporan);
                this.$router.push('/');
            }, error => {
                console.log("Error: " + error);
            });
        }
    }
}
</script>