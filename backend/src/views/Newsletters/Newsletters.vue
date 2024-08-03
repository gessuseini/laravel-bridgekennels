<script setup lang="ts">
import NewslettersTable from "./NewslettersTable.vue";
import NewsletterModal from "./NewsletterModal.vue";
import { Tabs } from '@/components/ui/tabs';
import { Button } from '@/components/ui/button'
import { ref } from "vue";
import store from "../../store/index.js";

const DEFAULT_NEWSLETTER = {
    id: '',
    title: '',
    content: ''
};

const showModal = ref(false);
const newsletterModal = ref({
    id: '',
    title: '',
    content: ''
});

function editNewsletter(newsletter) {
    store.dispatch('getNewsletter', newsletter.id)
        .then(({ data }) => {
            newsletterModal.value = data;
            showNewsletterModal();
        })
        .catch((error) => {
            console.error('Error fetching Newsletters:', error);
        });
}

function showNewsletterModal() {
    showModal.value = true;
}

function onModalClose() {
    newsletterModal.value = { ...DEFAULT_NEWSLETTER };
}

import {
    PlusCircle,
} from 'lucide-vue-next'
</script>

<template>
    <main class="grid flex-1 items-start gap-4 p-4 sm:px-6 sm:py-0 md:gap-8">
        <Tabs default-value="all">
            <div class="flex items-center">
                <div class="ml-auto flex items-center gap-2">
                    <!--                    Filter after database integration-->
                    <!--                    <DropdownMenu>-->
                    <!--                        <DropdownMenuTrigger as-child>-->
                    <!--                            <Button variant="outline" size="sm" class="h-7 gap-1">-->
                    <!--                                <ListFilter class="h-3.5 w-3.5" />-->
                    <!--                                <span class="sr-only sm:not-sr-only sm:whitespace-nowrap">-->
                    <!--                      Filter-->
                    <!--                    </span>-->
                    <!--                            </Button>-->
                    <!--                        </DropdownMenuTrigger>-->
                    <!--                        <DropdownMenuContent align="end">-->
                    <!--                            <DropdownMenuLabel>Filter by</DropdownMenuLabel>-->
                    <!--                            <DropdownMenuSeparator />-->
                    <!--                            <DropdownMenuItem checked>-->
                    <!--                                Active-->
                    <!--                            </DropdownMenuItem>-->
                    <!--                            <DropdownMenuItem>Draft</DropdownMenuItem>-->
                    <!--                            <DropdownMenuItem>-->
                    <!--                                Archived-->
                    <!--                            </DropdownMenuItem>-->
                    <!--                        </DropdownMenuContent>-->
                    <!--                    </DropdownMenu>-->
                    <!--                    <Button size="sm" variant="outline" class="h-7 gap-1">-->
                    <!--                        <File class="h-3.5 w-3.5" />-->
                    <!--                        <span class="sr-only sm:not-sr-only sm:whitespace-nowrap">-->
                    <!--                  Export-->
                    <!--                </span>-->
                    <!--                    </Button>-->
                    <Button @click="showNewsletterModal()" size="sm" class="h-7 gap-1">
                        <PlusCircle class="h-3.5 w-3.5" />
                        <span class="sr-only sm:not-sr-only sm:whitespace-nowrap">
                  Add Newsletter
                </span>
                    </Button>
                </div>
            </div>
            <NewsletterModal v-model="showModal" :newsletter="newsletterModal" @close="onModalClose" />
            <NewslettersTable @clickEdit="editNewsletter" />
        </Tabs>
    </main>
</template>

<style scoped>

</style>
