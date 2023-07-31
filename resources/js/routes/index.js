import { createWebHistory, createRouter } from "vue-router";
import HomePage from "../pages/HomePage.vue";

const routes = [
    {
        path: '/',
        name: 'HomePage',
        component: HomePage,
    },
    {
        path: '/tasks/:id',
        name: 'TaskDetailsPage',
        component: () => import('../pages/TaskDetailsPage.vue'),
    },
    {
        path: '/create-task',
        name: 'CreatePage',
        component: () => import('../pages/CreatePage.vue'),
    },
    {
        path: '/edit-task/:id',
        name: 'EditPage',
        component: () => import('../pages/EditPage.vue'),
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'NotFoundPage',
        component: () => import('../pages/NotFoundPage.vue'),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
