import Vue from 'vue'
import Router from 'vue-router'
import AppView  from '../views/App.vue'
import ItemCreateView from '../views/ItemCreate.vue'

Vue.use(Router);

// route-level code splitting
// const AppView   = () => import('../views/App.vue');
//const ItemCreateView  = (resolve) => require(['../views/ItemCreate.vue'], resolve);

const router = new Router({
    //mode: 'history',
    //scrollBehavior: () => ({ y: 0 }),
    linkActiveClass: 'active',
    routes: [
        { path: '/', name: 'app', component: AppView },
        //{ path: '/top/:page(\\d+)?', component: createListView('top') },
        { path: '/item/new', component: ItemCreateView },
        { path: '/item/:id(\\d+)/edit', name: 'item.edit', component: ItemCreateView },
        //{ path: '/user/:id', component: UserView },
        //{ path: '/', redirect: '/top' }
    ]
});

export default router
