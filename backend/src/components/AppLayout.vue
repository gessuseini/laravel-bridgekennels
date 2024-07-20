<template>
    <div v-if="currentUser.id" className="flex min-h-screen w-full flex-col bg-muted/40">
        <!-- Sidebar -->
        <Sidebar :class="{ '-ml-[200px]': !sidebarOpened }"/>

        <!-- Main content wrapper -->
        <div className="flex flex-col sm:gap-4 sm:py-4 sm:pl-14">
            <!-- Header -->
            <Navbar v-if="shouldShowNavbar"/>
            <!-- Content -->
            <main>
                <router-view></router-view>
            </main>
        </div>
    </div>

    <div v-else className="min-h-full bg-white flex items-center justify-center">
        <Spinner/>
    </div>
</template>

<script setup>
import {ref, onMounted, computed} from "vue";
import {useRoute} from "vue-router";
import Sidebar from "../components/Sidebar.vue";
import Navbar from "../components/Navbar.vue";
import Spinner from "../components/core/Spinner.vue";
import store from "../store";

const {title} = defineProps({
    title: String,
});

const currentUser = computed(() => store.state.user.data);
const sidebarOpened = ref(true);
const route = useRoute();

// Determine if the current route should show the navbar
const shouldShowNavbar = computed(() => {
    return route.path.startsWith("/app");
});

onMounted(() => {
    store.dispatch("getUser");
});

const emit = defineEmits(["submit"]);
</script>

<style scoped></style>
