<script setup lang="ts">
import BreedingsTable from "./BreedingsTable.vue";
import BreedingModal from "./BreedingModal.vue";
import { ref } from "vue";
import store from "../../store/index.js";

const DEFAULT_BREEDING = {
    id: '',
    breeding_male_dog_name: '',
    breeding_female_dog_name: '',
    breeding_description: '',
    breeding_price: '',
    breeding_female_dog_image: '',
    breeding_male_dog_image: ''
};

const showModal = ref(false);
const breedingModal = ref({
    id: '',
    breeding_male_dog_name: '',
    breeding_female_dog_name: '',
    breeding_description: '',
    breeding_price: '',
    breeding_female_dog_image: '',
    breeding_male_dog_image: ''
});

function editBreeding(breeding) {
    store.dispatch('getBreeding', breeding.id)
        .then(({ data }) => {
            breedingModal.value = data;
            showBreedingModal();
        })
        .catch((error) => {
            console.error('Error fetching Breeding:', error);
        });
}

function showBreedingModal() {
    showModal.value = true;
}

function onModalClose() {
    breedingModal.value = { ...DEFAULT_BREEDING };
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
                    <Button @click="showBreedingModal()" size="sm" class="h-7 gap-1">
                        <PlusCircle class="h-3.5 w-3.5" />
                        <span class="sr-only sm:not-sr-only sm:whitespace-nowrap">
                  Add breeding
                </span>
                    </Button>
                </div>
            </div>
            <BreedingModal v-model="showModal" :breeding="breedingModal" @close="onModalClose" />
            <BreedingsTable @clickEdit="editBreeding" />
        </Tabs>
    </main>
</template>

<style scoped>

</style>
