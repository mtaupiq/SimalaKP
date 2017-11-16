module.exports = {

    getAll: () => {
        return new Promise((resolve, reject) => {
            axios.get('laporans').then(response => {
                let laporans = response.data;
                DB.updateAll('laporans', laporans);
                resolve(laporans);
            }, error => {
                DB.getAll('laporans').then(laporans => {
                    resolve(laporans);
                }, error => {
                    reject(error);
                });
            });
        });
    },
    
    create: (data, isRetry) => {
        return new Promise((resolve, reject) => {
            if (data._deleted) {
                resolve();
            } else {
                axios.post('laporans', data).then(response => {
                    let laporan = response.data;
                    if (! isRetry) {
                        DB.insert('laporans', laporan);
                    } else {
                       DB.replace('laporans', data.id, laporan); 
                    }
                    resolve(laporan);
                }, error => {
                    if (! isRetry) {
                        let id = (new Date).getTime();
                        data.id = id;
                        data._draft = true;
                        DB.insert('laporans', data).then(() => {
                            Store.push({
                                store: 'laporans',
                                action: 'create',
                                data: data
                            });
                            resolve(data);
                        }, error => {
                            reject(error);
                        });
                    } else {
                        reject(error);
                    }
                });
            }
        });
    },

    update: (laporan, isRetry) => {
        return new Promise((resolve, reject) => {
            if (laporan._deleted) {
                resolve();
            } else {
                axios.put('laporans/' + laporan.id, laporan).then(response => {
                    let laporan = response.data;
                    DB.update('laporans', laporan);
                    resolve(laporan);
                }, error => {
                    if (! isRetry) {
                        DB.update('laporans', laporan).then(() => {
                            if (! laporan._draft) {
                                Store.push({
                                    store: 'laporans',
                                    action: 'update',
                                    data: laporan
                                });
                            }

                            resolve(laporan);
                        }, error => {
                            reject(error);
                        });
                    } else {
                        reject(error);
                    }
                });
            }
        });
    },

    delete: (laporan, isRetry) => {
        return new Promise((resolve, reject) => {
            axios.delete('laporans/' + laporan.id).then(response => {
                DB.delete('laporans', laporan.id);
                resolve();
            }, error => {
                if (! isRetry) {
                    DB.delete('laporans', laporan.id).then(() => {
                        if (! laporan._draft) {
                            Store.push({
                                store: 'laporans',
                                action: 'delete',
                                data: laporan
                            });
                        } else {
                            laporan._deleted = true;
                        }

                        resolve();
                    }, error => {
                        reject(error);
                    });
                } else {
                    reject(error);
                }
            });
        });
    },

};