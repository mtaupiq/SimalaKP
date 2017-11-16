<template>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <laporan-list :laporans="laporans"></laporan-list>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        components: {
            'laporan-list': require('../../components/LaporanList')
        },

        data() {
            return {
                laporans: null,
            };
        },

        created() {
            Store.refresh = this.fetchData;
            this.fetchData();
        },

        watch: {
            '$route': 'fetchData'
        },

        methods: {
            fetchData() {
                Store.laporans.getAll().then(laporans => {
                    this.laporans = laporans;
                }, this.errorHandler);
            },

            errorHandler(error) {
                console.error("Error: " + error);
            }
        }

    }
</script>