<template>
    <div class="col-md-8 col-md-offset-2">
       <form @submit.prevent="updateLaporan">
            <div class="panel panel-default">
                <div class="panel-heading">Buat Laporan Kegiatan</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Judul:</label>
                        <input class="form-control" type="text" name="judul" v-model="laporan.judul" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Foto:</label>
                        <input class="form-control" type="file" @change="imgChange" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" v-model="laporan.deskripsi" required></textarea>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <router-link :to="'/laporan/' + laporan.id" exact class="btn btn-default" role="button">Kembali</router-link>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            laporan: {}
        };
    },
    created() {
        const id = this.$route.params.id;
    	axios.get('laporans/' + id).then(response => {
    		this.laporan = response.data
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
        imgChange(event) {
            var fileReader = new FileReader()

            fileReader.readAsDataURL(event.target.files[0])

            fileReader.onload = (event) => {
              this.laporan.foto = event.target.result
            }
        },
        updateLaporan() {
            Store.laporans.update(this.laporan).then(laporan => {
                this.$emit('update-laporan', laporan);
                this.$router.push('/laporan');
            }, error => {
                console.error("Error: " + error);
            });
        }
    }
}
</script>