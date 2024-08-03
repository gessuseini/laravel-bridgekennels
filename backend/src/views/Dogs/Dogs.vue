<script setup lang="ts">
import DogsTable from "./DogsTable.vue";
import DogModal from "./DogModal.vue";
import { ref } from "vue";
import store from "../../store/index.js";

const DEFAULT_DOG = {
    id: '',
    dog_name: '',
    dog_type: '',
    dog_breed: '',
    dog_age: '',
    dog_gender: '',
    dog_weight: '',
    dog_price: '',
    dog_image: '',
    dog_size: '',
    dog_color: '',
    dog_description: ''
};

const showModal = ref(false);
const dogModal = ref({
    id: '',
    dog_name: '',
    dog_type: '',
    dog_breed: '',
    dog_age: '',
    dog_gender: '',
    dog_weight: '',
    dog_price: '',
    dog_image: '',
    dog_size: '',
    dog_color: '',
    dog_description: ''
});

function editDog(dog) {
    store.dispatch('getDog', dog.id)
        .then(({ data }) => {
            dogModal.value = data;
            showDogModal();
        })
        .catch((error) => {
            console.error('Error fetching Dog:', error);
        });
}

function showDogModal() {
    showModal.value = true;
}

function onModalClose() {
    dogModal.value = { ...DEFAULT_DOG };
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
                    <Button @click="showDogModal()" size="sm" class="h-7 gap-1">
                        <PlusCircle class="h-3.5 w-3.5" />
                        <span class="sr-only sm:not-sr-only sm:whitespace-nowrap">
                  Add dog
                </span>
                    </Button>
                </div>
            </div>
            <DogModal v-model="showModal" :dog="dogModal" @close="onModalClose" />
            <DogsTable @clickEdit="editDog" />
        </Tabs>
    </main>
</template>

<style scoped>

</style>
