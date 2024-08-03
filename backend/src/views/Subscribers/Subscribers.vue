<script setup lang="ts">
import { ref } from "vue";
// import store from "../../store/index.js";
import SubscribersTable from "./SubscribersTable.vue";
import SubscriberModal from "./SubscriberModal.vue";

import { Tabs } from '@/components/ui/tabs'
import { Button } from '@/components/ui/button'

import {
    PlusCircle,
} from 'lucide-vue-next'

const DEFAULT_SUBSCRIBER = {
    id: '',
    email: ''
};

const showModal = ref(false);
const subscriberModal = ref({
    id: '',
    email: ''
});

// function editSubscriber(subscriber) {
//     store.dispatch('getSubscriber', subscriber.id)
//         .then(({ data }) => {
//             subscriberModal.value = data;
//             showSubscriberModal();
//         })
//         .catch((error) => {
//             console.error('Error fetching Subscriber:', error);
//         });
// }

function showSubscriberModal() {
    showModal.value = true;
}

function onModalClose() {
    showModal.value = false;
    subscriberModal.value = { ...DEFAULT_SUBSCRIBER };
}
</script>

<template>
    <main class="grid flex-1 items-start gap-4 p-4 sm:px-6 sm:py-0 md:gap-8">
        <Tabs default-value="all">
            <div class="flex items-center">
                <div class="ml-auto flex items-center gap-2">
                    <Button @click="showSubscriberModal()" size="sm" class="h-7 gap-1">
                        <PlusCircle class="h-3.5 w-3.5" />
                        <span class="sr-only sm:not-sr-only sm:whitespace-nowrap">
                            Add Subscriber
                        </span>
                    </Button>
                </div>
            </div>
            <SubscriberModal v-model:show="showModal" :subscriber="subscriberModal" @close="onModalClose" />
            <SubscribersTable />
        </Tabs>
    </main>
</template>

<style scoped>
</style>
