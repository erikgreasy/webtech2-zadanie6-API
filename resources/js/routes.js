import Home from './views/Home.vue';
import Holidays from './views/Holidays.vue';
import AddNameday from './views/AddNameday.vue';
import NotFound from './views/NotFound.vue';
import ROUTE_PREFIX from '../../config'

export default [
    {
        path: ROUTE_PREFIX.ROUTE_PREFIX + '/',
        name: 'Home',
        component: Home
    },
    {
        path: ROUTE_PREFIX.ROUTE_PREFIX + '/holidays',
        name: 'Holidays',
        component: Holidays
    },
    {
        path: ROUTE_PREFIX.ROUTE_PREFIX + '/add-nameday',
        name: 'AddNameday',
        component: AddNameday
    },
    {
        path: '*',
        name: 'Not Found',
        component: NotFound
    }
]