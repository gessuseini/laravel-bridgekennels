<template>
    <div
        class="min-h-full flex items-center mt-32 justify-center py-12 px-4 sm:px-6 lg:px-8"
    >
        <div class="max-w-md w-full space-y-8 rounded-2xl p-10">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img
                    class="mx-auto h-18 w-auto"
                    src="http://localhost:8000/images/default-monochrome-black.svg"
                    alt="B-Ridge Kennels"
                />
            </div>
            <div>
                <h2
                    class="mt-6 text-center text-3xl font-extrabold text-gray-900"
                >
                    {{ title }}
                </h2>
            </div>
            <form
                class="mt-8 space-y-6"
                @submit.prevent="emit('submit')"
                method="POST"
            >
                <slot></slot>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
const { title } = defineProps({
    title: String,
});

const emit = defineEmits(["submit"]);
</script>

<style scoped></style>
