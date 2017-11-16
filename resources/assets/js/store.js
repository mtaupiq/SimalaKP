const LaporansStore = require('./stores/laporans.js');

module.exports = (function() {
    let Store = {
        laporans: LaporansStore,
        actions: [],
        refresh: () => {},
    };

    Store.init = () => {
        DB.getAll('actions').then(actions => {
            actions.forEach(action => {
                Store.actions.push(action);
            });

            setTimeout(Store.sync, 3000);
        })
    };

    Store.sync = () => {
        let action = Store.actions[0];
        if (action) {
            Store.work(action).then(() => {
                DB.delete('actions', action.id);
                Store.actions.shift();
                if (Store.actions.length > 0) {
                    Store.sync();
                } else {
                    Store.refresh();
                    setTimeout(Store.sync, 3000);
                }
            }, error => {
                setTimeout(Store.sync, 3000);
            });
        } else {
            setTimeout(Store.sync, 3000);
        }
    };

    Store.work = action => {
        let store = null;

        switch(action.store) {
            case 'laporans':
                store = Store.laporans;
                break;
        }

        switch(action.action) {
            case 'delete':
                return store.delete(action.data, true);
            case 'create':
                return store.create(action.data, true);
            case 'update':
                return store.update(action.data, true);
        }
    };

    Store.push = action => {
        action.id = (new Date()).getTime();
        Store.actions.push(action);
        DB.insert('actions', action);
    };

    return Store;
}());