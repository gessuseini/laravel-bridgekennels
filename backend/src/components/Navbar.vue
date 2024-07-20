<script setup>
import { ref, watch } from 'vue';
import {
    CircleUser,
    CircleHelp,
    Home,
    LineChart,
    Package,
    Package2,
    PanelLeft,
    Search,
    Settings,
    Users2,
    AtSign,
    Send,
    Dog,
} from 'lucide-vue-next';

import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbSeparator,
} from '@/components/ui/breadcrumb';

import { Button } from '@/components/ui/button';
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { Input } from '@/components/ui/input';
import { Sheet, SheetContent, SheetTrigger } from '@/components/ui/sheet';

import { useRouter, useRoute } from 'vue-router';
import store from "../store/index";

const router = useRouter();
const route = useRoute();

const emit = defineEmits(["toggle-sidebar"]);
const isSidebarOpen = ref(false);

function closeSidebar() {
    isSidebarOpen.value = false;
}

function logout() {
    store.dispatch('logout')
        .then(() => {
            router.push({ name: 'login' });
        });
}

// Function to get the breadcrumb text based on the current route
function getBreadcrumbText() {
    const routePath = router.currentRoute.value.path;
    switch (routePath) {
        case '/app/faqs':
            return 'Frequently Asked Questions';
        case '/app/users':
            return 'Users';
        case '/app/dogs':
            return 'Dogs';
        case '/app/dogs/add-dog':
            return 'Add Dog';
        case '/app/analytics':
            return 'Analytics';
        case '/app/team-members':
            return 'Team Members';
        case '/app/newsletters':
            return 'Newsletters';
        case '/app/subscribers':
            return 'Subscribers';
        case '/app/products':
            return 'Products';
        case '/app/settings':
            return 'Settings';
        default:
            return 'Dashboard';
    }
}

watch(isSidebarOpen, (newValue) => {
    emit("toggle-sidebar", newValue);
});

const isActiveRoute = (path) => {
    return route.path === path;
};
</script>

<template>
    <header class="sticky top-0 z-30 flex h-14 items-center gap-4 border-b bg-background px-4 sm:static sm:h-auto sm:border-0 sm:bg-transparent sm:px-6">
        <Sheet :open="isSidebarOpen" @update:open="isSidebarOpen = $event">
            <SheetTrigger as-child>
                <Button size="icon" variant="outline" class="sm:hidden">
                    <PanelLeft class="h-5 w-5" />
                    <span class="sr-only">Toggle Menu</span>
                </Button>
            </SheetTrigger>
            <SheetContent side="left" class="sm:max-w-xs">
                <nav class="grid gap-6 text-lg font-medium">
                    <a
                        href="#"
                        class="group flex h-10 w-10 shrink-0 items-center justify-center gap-2 rounded-full bg-primary text-lg text-primary-foreground md:text-base"
                    >
                        <Package2 class="h-5 w-5 transition-all group-hover:scale-110" />
                        <span class="sr-only">Acme Inc</span>
                    </a>
                    <a
                        @click="() => { $router.push({ name: 'app.dashboard' }); closeSidebar(); }"
                        :class="isActiveRoute('/app/dashboard') ? 'flex items-center gap-4 px-2.5 text-foreground' : 'flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground'"
                    >
                        <Home class="h-5 w-5" />
                        Dashboard
                    </a>
                    <a
                        @click="() => { $router.push({ name: 'app.dogs' }); closeSidebar(); }"
                        :class="isActiveRoute('/app/dogs') ? 'flex items-center gap-4 px-2.5 text-foreground' : 'flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground'"
                    >
                        <Dog class="h-5 w-5" />
                        Dogs
                    </a>
                    <a
                        @click="() => { $router.push({ name: 'app.products' }); closeSidebar(); }"
                        :class="isActiveRoute('/app/products') ? 'flex items-center gap-4 px-2.5 text-foreground' : 'flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground'"
                    >
                        <Package class="h-5 w-5" />
                        Products
                    </a>
                    <a
                        @click="() => { $router.push({ name: 'app.users' }); closeSidebar(); }"
                        :class="isActiveRoute('/app/users') ? 'flex items-center gap-4 px-2.5 text-foreground' : 'flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground'"
                    >
                        <Users2 class="h-5 w-5" />
                        Users
                    </a>
                    <a
                        @click="() => { $router.push({ name: 'app.subscribers' }); closeSidebar(); }"
                        :class="isActiveRoute('/app/subscribers') ? 'flex items-center gap-4 px-2.5 text-foreground' : 'flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground'"
                    >
                        <AtSign class="h-5 w-5" />
                        Subscribers
                    </a>
                    <a
                        @click="() => { $router.push({ name: 'app.faqs' }); closeSidebar(); }"
                        :class="isActiveRoute('/app/faqs') ? 'flex items-center gap-4 px-2.5 text-foreground' : 'flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground'"
                    >
                        <CircleHelp class="h-5 w-5" />
                        FAQs
                    </a>
                    <a
                        @click="() => { $router.push({ name: 'app.newsletters' }); closeSidebar(); }"
                        :class="isActiveRoute('/app/newsletters') ? 'flex items-center gap-4 px-2.5 text-foreground' : 'flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground'"
                    >
                        <Send class="h-5 w-5" />
                        Newsletters
                    </a>
                    <a
                        @click="() => { $router.push({ name: 'app.analytics' }); closeSidebar(); }"
                        :class="isActiveRoute('/app/analytics') ? 'flex items-center gap-4 px-2.5 text-foreground' : 'flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground'"
                    >
                        <LineChart class="h-5 w-5" />
                        Analytics
                    </a>
                    <a
                        @click="() => { $router.push({ name: 'app.settings' }); closeSidebar(); }"
                        :class="isActiveRoute('/app/settings') ? 'flex items-center gap-4 px-2.5 text-foreground' : 'flex items-center gap-4 px-2.5 text-muted-foreground hover:text-foreground'"
                    >
                        <Settings class="h-5 w-5" />
                        Settings
                    </a>
                </nav>
            </SheetContent>
        </Sheet>
        <Breadcrumb class="hidden md:flex">
            <BreadcrumbList>
                <BreadcrumbSeparator />
                <BreadcrumbItem>
                    <BreadcrumbLink as-child>
                        <p>{{ getBreadcrumbText() }}</p>
                    </BreadcrumbLink>
                </BreadcrumbItem>
            </BreadcrumbList>
        </Breadcrumb>
        <div class="relative ml-auto flex-1 md:grow-0">
            <Search class="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground" />
            <Input
                type="search"
                placeholder="Search..."
                class="w-full rounded-lg bg-background pl-8 md:w-[200px] lg:w-[336px]"
            />
        </div>
        <DropdownMenu>
            <DropdownMenuTrigger as-child>
                <Button variant="secondary" size="icon" class="rounded-full">
                    <CircleUser class="h-5 w-5" />
                    <span class="sr-only">Toggle user menu</span>
                </Button>
            </DropdownMenuTrigger>
            <DropdownMenuContent align="end">
                <DropdownMenuLabel @click="$router.push({ name: 'app.profile' })">My Account</DropdownMenuLabel>
                <DropdownMenuSeparator />
                <DropdownMenuItem @click="$router.push({ name: 'app.profile.settings' })">Settings</DropdownMenuItem>
                <DropdownMenuSeparator />
                <DropdownMenuItem @click="logout">Logout</DropdownMenuItem>
            </DropdownMenuContent>
        </DropdownMenu>
    </header>
</template>
