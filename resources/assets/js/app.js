require('./bootstrap');

const routes = [
	{ path: '/', component: require('./views/Laporans/ListLaporanView') },
	{ 
        path: '/laporan', 
        component: require('./views/LaporanView'),
        children: [
            { path: '', component: require('./views/Laporans/ListLaporanView') },
            { path: 'buat', component: require('./views/Laporans/BuatLaporanView') },
            { path: ':id', props: true, component: require('./views/Laporans/LihatLaporanView') },
            { path: ':id/edit', props: true, component: require('./views/Laporans/EditLaporanView') },
        ]
    }
];

const router = new VueRouter({
	root: '/',
	mode: 'history',
	linkActiveClass: 'active',
	routes
});

const app = new Vue({
	router,

    data: {
        actions: Store.actions,
        loading: true,
    },

    created() {
        DB.open(() => {
            this.loading = false;
            Store.init();
        });
    }
}).$mount('#app');
