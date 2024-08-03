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
                            class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-[400px] sm:w-full">
                            <Spinner v-if="loading"
                                     class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>
                            <header class="py-3 px-4 flex justify-between items-center">
                                <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                    {{ dog.id ? `Edit: ${props.dog.dog_name}` : 'Add new Dog' }}
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
                                <div v-if="!loading" class="bg-white px-4 pt-5 pb-4">
                                    <CustomInput class="mb-2" v-model="dog.dog_name" label="Name" />
                                    <select v-model="dog.dog_type" id="dog_type" name="dog_type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 mb-2 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md">
                                        <option :disabled="true" value="">Dog Type</option>
                                        <option value="adult">Adult</option>
                                        <option value="puppy">Puppy</option>
                                    </select>
                                    <CustomInput class="mb-2" v-model="dog.dog_breed" label="Breed" />
                                    <CustomInput class="mb-2" v-model="dog.dog_age" label="Age" />
                                    <select v-model="dog.dog_gender" id="dog_gender" name="dog_gender" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 mb-2 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md">
                                        <option :disabled="true" value="">Dog Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <CustomInput class="mb-2" v-model="dog.dog_weight" label="Weight" />
                                    <CustomInput class="mb-2" v-model="dog.dog_size" label="Size" />
                                    <CustomInput class="mb-2" v-model="dog.dog_color" label="Color" />
                                    <CustomInput type="file" class="mb-2" label="Dog Image" @change="file => dog.dog_image = file"/>
                                    <CustomInput class="mb-2" v-model="dog.dog_description" label="Description" />
                                    <CustomInput class="mb-2" v-model="dog.dog_price" label="Price" prepend="$" />

                                </div>
                                <footer class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="submit"
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-primary text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm
                          text-white">
                                        Submit
                                    </button>
                                    <button type="button"
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                            @click="closeModal" ref="cancelButtonRef">
                                        Cancel
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
    dog: {
        required: true,
        type: Object,
    }
})

const emit = defineEmits(['update:modelValue', 'close'])

const show = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
})

const dog = ref({
    id: props.dog.id,
    dog_name: props.dog.dog_name,
    dog_type: props.dog.dog_type,
    dog_breed: props.dog.dog_breed,
    dog_age: props.dog.dog_age,
    dog_gender: props.dog.dog_gender,
    dog_weight: props.dog.dog_weight,
    dog_size: props.dog.dog_size,
    dog_color: props.dog.dog_color,
    dog_image: props.dog.dog_image,
    dog_description: props.dog.dog_description,
    dog_price: props.dog.dog_price
})

onUpdated(() => {
    dog.value = {
        id: props.dog.id,
        dog_name: props.dog.dog_name,
        dog_type: props.dog.dog_type,
        dog_breed: props.dog.dog_breed,
        dog_age: props.dog.dog_age,
        dog_gender: props.dog.dog_gender,
        dog_weight: props.dog.dog_weight,
        dog_size: props.dog.dog_size,
        dog_color: props.dog.dog_color,
        dog_image: props.dog.dog_image,
        dog_description: props.dog.dog_description,
        dog_price: props.dog.dog_price
    }
})

function closeModal() {
    show.value = false;
    emit('close');
}

function onSubmit() {
    loading.value = true
    if (dog.value.id) {
        store.dispatch('updateDog', dog.value)
            .then(response => {
                loading.value = false;
                if (response.status === 200) {
                    // TODO show notification
                    store.dispatch('getDogs');
                    closeModal();
                }
            })
    } else {
        store.dispatch('createDog', dog.value)
            .then(response => {
                loading.value = false;
                if (response.status === 201) {
                    // TODO show notification
                    store.dispatch('getDogs');
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
