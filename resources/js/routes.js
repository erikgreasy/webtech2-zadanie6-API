import Home from './views/Home.vue';
import Holidays from './views/Holidays.vue';
import AddNameday from './views/AddNameday.vue';

import NotFound from './views/NotFound.vue';

export default [
    {
        path: '/webtech/zadanie6/',
        name: 'Home',
        component: Home
    },
    {
        path: '/webtech/zadanie6/holidays',
        name: 'Holidays',
        component: Holidays
    },
    {
        path: '/webtech/zadanie6/add-nameday',
        name: 'AddNameday',
        component: AddNameday
    },
    {
        path: '*',
        name: 'Not Found',
        component: NotFound
    }
]