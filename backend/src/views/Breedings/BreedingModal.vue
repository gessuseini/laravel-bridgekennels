<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <TransitionRoot as="template" :show="show">
        <Dialog @click="closeModal" as="div" class="relative z-40" @close="show = false">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
                             leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-black bg-opacity-70 transition-opacity"/>
            </TransitionChild>

            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex sm:items-center justify-center min-h-full p-4 text-center sm:p-0 items-center">
                    <TransitionChild as="template" enter="ease-out duration-300"
                                     enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                     enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                                     leave-from="opacity-100 translate-y-0 sm:scale-100"
                                     leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel
                            class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-[400px] sm:w-full lg:max-w-[800px]">
                            <Spinner v-if="loading"
                                     class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>
                            <header class="py-3 px-4 flex justify-between items-center">
                                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                    {{ breeding.id ? `Edit: ${props.breeding.breeding_male_dog_name} x ${props.breeding.breeding_female_dog_name}` : 'Add new Breeding' }}
                                </DialogTitle>
                                <button
                                    @click="closeModal"
                                    class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>
                                </button>
                            </header>
                            <form @submit.prevent="onSubmit">
                                <div v-if="!loading" class="bg-white px-4 pt-5 pb-4 flex">
                                    <div class="w-1/2 pr-2">
                                        <h2 class="text-lg font-semibold mb-4">Male Dog</h2>
                                        <CustomInput class="mb-2" v-model="breeding.breeding_male_dog_name" label="Male Dog Name" />
                                        <CustomInput type="file" class="mb-2" label="Male Dog Image" @change="file => breeding.breeding_male_dog_image = file"/>
                                    </div>
                                    <div class="w-1/2 pl-2">
                                        <h2 class="text-lg font-semibold mb-4">Female Dog</h2>
                                        <CustomInput class="mb-2" v-model="breeding.breeding_female_dog_name" label="Female Dog Name" />
                                        <CustomInput type="file" class="mb-2" label="Female Dog Image" @change="file => breeding.breeding_female_dog_image = file"/>
                                    </div>
                                </div>
                                <div v-if="!loading" class="bg-white px-4 pt-5 pb-4">
                                    <CustomInput type="textarea" class="mb-2 h-50" v-model="breeding.breeding_description" label="Description" />
                                    <CustomInput class="mb-2" v-model="breeding.breeding_price" label="Price" prepend="$" />
                                </div>
                                <footer class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="submit"
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-primary text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm text-white">
                                        Submit
                                    </button>
                                </footer>
                            </form>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import {computed, onUpdated, ref} from 'vue'
import {Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot} from '@headlessui/vue'
import CustomInput from "../../components/core/CustomInput.vue";
import store from "../../store/index.js";
import Spinner from "../../components/core/Spinner.vue";

const loading = ref(false);

const props = defineProps({
    modelValue: Boolean,
    breeding: {
        required: true,
        type: Object,
    }
})

const emit = defineEmits(['update:modelValue', 'close'])

const show = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})

const breeding = ref({
    id: props.breeding.id,
    breeding_male_dog_name: props.breeding.breeding_male_dog_name,
    breeding_female_dog_name: props.breeding.breeding_female_dog_name,
    breeding_description: props.breeding.breeding_description,
    breeding_price: props.breeding.breeding_price,
    breeding_male_dog_image: props.breeding.breeding_male_dog_image,
    breeding_female_dog_image: props.breeding.breeding_female_dog_image
})

onUpdated(() => {
    breeding.value = {
        id: props.breeding.id,
        breeding_male_dog_name: props.breeding.breeding_male_dog_name,
        breeding_female_dog_name: props.breeding.breeding_female_dog_name,
        breeding_description: props.breeding.breeding_description,
        breeding_price: props.breeding.breeding_price,
        breeding_male_dog_image: props.breeding.breeding_male_dog_image,
        breeding_female_dog_image: props.breeding.breeding_female_dog_image
    }
})

function closeModal() {
    show.value = false;
    emit('close');
}

function onSubmit() {
    loading.value = true
    if (breeding.value.id) {
        store.dispatch('updateBreeding', breeding.value)
            .then(response => {
                loading.value = false;
                if (response.status === 200) {
                    // TODO show notification
                    store.dispatch('getBreedings');
                    closeModal();
                }
            })
    } else {
        store.dispatch('createBreeding', breeding.value)
            .then(response => {
                loading.value = false;
                if (response.status === 201) {
                    // TODO show notification
                    store.dispatch('getBreedings');
                    closeModal();
                }
            })
            .catch(() => {
                loading.value = false;
                debugger;
            })
    }
}
</script>
