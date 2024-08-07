import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Login from "../views/Login.vue";
import Home from "../views/Home.vue";
import About from "../views/About.vue";
import Contact from "../views/Contact.vue";
import Services from "../views/Services.vue";
import NotFound from "../views/NotFound.vue";
import RequestPassword from "../views/RequestPassword.vue";
import ResetPassword from "../views/ResetPassword.vue";
import AppLayout from "../components/AppLayout.vue";
import DogsLayout from "../components/DogsLayout.vue";
import store from "../store";
import Dogs from "../views/Dogs/Dogs.vue";
import AddDog from "../views/AddDog.vue";
import Settings from "../views/Settings.vue";
import Products from "../views/Products.vue";
import FAQs from "../views/FAQ/FAQs.vue";
import Users from "../views/Users/Users.vue";
import Subscribers from "../views/Subscribers/Subscribers.vue";
import Newsletters from "../views/Newsletters/Newsletters.vue";
import UserSettings from "../views/UserSettings.vue";
import Analytics from "../views/Analytics.vue";
import Breedings from "../views/Breedings/Breedings.vue";
import TeamMembers from "../views/TeamMembers/TeamMembers.vue";

const routes = [
    {
        path: '/',
        redirect: '/app'
    },
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/app",
        name: "app",
        redirect: "/app/dashboard",
        component: AppLayout,
        meta: {
            requiresAuth: true,
        },
        children: [
            {
                path: "dashboard",
                name: "app.dashboard",
                component: Dashboard,
            },
            {
                path: "dogs",
                component: DogsLayout,
                children: [
                    {
                        path: "", // This represents /app/dogs
                        name: "app.dogs",
                        component: Dogs,
                    },
                    {
                        path: "add-dog", // This represents /app/dogs/add-dog
                        name: "app.add-dog",
                        component: AddDog,
                    },
                ],
            },
            {
                path: "products",
                name: "app.products",
                component: Products,
            },
            {
                path: "subscribers",
                name: "app.subscribers",
                component: Subscribers,
            },
            {
                path: "newsletters",
                name: "app.newsletters",
                component: Newsletters,
            },
            {
                path: "users",
                name: "app.users",
                component: Users,
            },
            {
                path: "faqs",
                name: "app.faqs",
                component: FAQs,
            },
            {
                path: "analytics",
                name: "app.analytics",
                component: Analytics,
            },
            {
                path: 'breedings',
                name: 'app.breedings',
                component: Breedings,
            },
            {
                path: 'team-members',
                name: 'app.team-members',
                component: TeamMembers,
            },
            {
                path: "settings",
                name: "app.settings",
                component: Settings,
            },
            {
                path: "profile/settings",
                name: "app.profile.settings",
                component: UserSettings,
            },
        ],
    },
    {
        path: "/login",
        name: "login",
        meta: {
            requiresGuest: true,
        },
        component: Login,
    },
    {
        path: "/about-us",
        name: "about",
        component: About,
    },
    {
        path: "/contact-us",
        name: "contact",
        component: Contact,
    },
    {
        path: "/our-services",
        name: "services",
        component: Services,
    },
    {
        path: "/request-password",
        name: "request-password",
        meta: {
            requiresGuest: true,
        },
        component: RequestPassword,
    },
    {
        path: "/reset-password",
        name: "reset-password",
        meta: {
            requiresGuest: true,
        },
        component: ResetPassword,
    },
    {
        path: "/:pathMatch(.*)",
        name: "notfound",
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({ name: "login" });
    } else if (to.meta.requiresGuest && store.state.user.token) {
        next({ name: "app.dashboard" });
    } else {
        next();
    }
});

export default router;
