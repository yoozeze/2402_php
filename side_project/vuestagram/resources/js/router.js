import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../components/LoginComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';
import store from './store';

function chkAuth(to, from, next) {
    if(!store.state.authFlg) {
        next('/login');
    }
    next();
}
function chkAuthRetrun(to, from, next) {
    if(store.state.authFlg) {
        if(from.path === '/') {
            next('board');
        }
        next(from.path);
    }
    next();
}

const routes = [
    {
        path: '/',
        redirect: '/login',
    },
    {
        path: '/login',
        component: LoginComponent,
        beforeEnter: chkAuthRetrun,
    },
    {
        path: '/board',
        component: BoardComponent,
        beforeEnter: chkAuth,
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;