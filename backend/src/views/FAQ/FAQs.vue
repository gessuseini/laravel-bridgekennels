<script setup lang="ts">
import FAQsTable from "./FAQsTable.vue";
import FAQModal from "./FAQModal.vue";
import { ref } from "vue";
import store from "../../store/index.js";

const DEFAULT_FAQ = {
    id: '',
    question: '',
    answer: ''
};

const showModal = ref(false);
const faqModal = ref({
    id: '',
    question: '',
    answer: ''
});

function editFAQ(faq) {
    store.dispatch('getFAQ', faq.id)
        .then(({ data }) => {
            faqModal.value = data;
            showFAQModal();
        })
        .catch((error) => {
            console.error('Error fetching FAQ:', error);
        });
}

function showFAQModal() {
    showModal.value = true;
}

function onModalClose() {
    faqModal.value = { ...DEFAULT_FAQ };
}

import {
    PlusCircle,
} from 'lucide-vue-next'

import { Tabs } from '@/components/ui/tabs'
import { Button } from '@/components/ui/button'
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
                    <Button @click="showFAQModal()" size="sm" class="h-7 gap-1">
                        <PlusCircle class="h-3.5 w-3.5" />
                        <span class="sr-only sm:not-sr-only sm:whitespace-nowrap">
                  Add FAQ
                </span>
                    </Button>
                </div>
            </div>
            <FAQModal v-model="showModal" :faq="faqModal" @close="onModalClose" />
            <FAQsTable @clickEdit="editFAQ" />
        </Tabs>
    </main>
</template>

<style scoped>

</style>
