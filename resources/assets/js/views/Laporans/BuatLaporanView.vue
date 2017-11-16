<template>
    <div class="col-md-8 col-md-offset-2">
        <form @submit.prevent="submitLaporan">
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
                    <router-link to="/laporan" exact class="btn btn-default" role="button">Kembali</router-link>
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
            laporan: {
                judul: '',
                deskripsi: '',
                foto: '',
            }
        };
    },

    methods: {
        imgChange(event) {
            var fileReader = new FileReader()

            fileReader.readAsDataURL(event.target.files[0])

            fileReader.onload = (event) => {
              this.laporan.foto = event.target.result
            }
        },
        submitLaporan() {
            Store.laporans.create(this.laporan).then(laporan => {
                this.$emit('create-laporan', laporan);
                this.$router.push('/laporan');
            }, error => {
                console.error("Error: " + error);
            });
        }

    }
}
</script>