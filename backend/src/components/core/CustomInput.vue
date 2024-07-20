<template>
    <div>
        <label class="sr-only">{{ label }}</label>
        <div class="mt-1 flex rounded-md shadow-sm relative">
            <span v-if="prepend"
                  class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                {{ prepend }}
            </span>
            <template v-if="type === 'select'">
                <select :name="name"
                        :required="required"
                        :value="props.modelValue"
                        :class="inputClasses"
                        @change="onChange($event.target.value)">
                    <option v-for="option of selectOptions" :value="option.key">{{option.text}}</option>
                </select>
            </template>
            <template v-else-if="type === 'textarea'">
                <textarea :name="name"
                          :required="required"
                          :value="props.modelValue"
                          @input="emit('update:modelValue', $event.target.value)"
                          :class="inputClasses"
                          :placeholder="label"></textarea>
            </template>
            <template v-else-if="type === 'file'">
                <input :type="type"
                       :name="name"
                       :required="required"
                       @change="handleFileChange"
                       :class="inputClasses"
                       :placeholder="label"/>
                <img v-if="preview" :src="preview" class="h-full w-16 object-cover absolute right-0 top-0 bottom-0 m-auto" />
            </template>
            <template v-else-if="type === 'checkbox'">
                <input :id="id"
                       :name="name"
                       :type="type"
                       :checked="props.modelValue"
                       :required="required"
                       @change="emit('update:modelValue', $event.target.checked)"
                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"/>
                <label :for="id" class="ml-2 block text-sm text-gray-900"> {{ label }} </label>
            </template>
            <template v-else>
                <input :type="type"
                       :name="name"
                       :required="required"
                       :value="props.modelValue"
                       @input="emit('update:modelValue', $event.target.value)"
                       :class="inputClasses"
                       :placeholder="label"
                       step="0.01"/>
            </template>
            <span v-if="append"
                  class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                {{ append }}
            </span>
        </div>
    </div>
</template>

<script setup>
import { computed, ref, watch } from "vue";

const props = defineProps({
    modelValue: [String, Number, File],
    label: String,
    type: {
        type: String,
        default: 'text'
    },
    name: String,
    required: Boolean,
    prepend: {
        type: String,
        default: ''
    },
    append: {
        type: String,
        default: ''
    },
    selectOptions: Array
});

const id = computed(() => {
    if (props.id) return props.id;
    return `id-${Math.floor(1000000 + Math.random() * 1000000)}`;
});

const inputClasses = computed(() => {
    const cls = [
        `block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-5 sm:text-sm`,
    ];
    if (props.append && !props.prepend) {
        cls.push(`rounded-l-md`);
    } else if (props.prepend && !props.append) {
        cls.push(`rounded-r-md`);
    } else if (!props.prepend && !props.append) {
        cls.push('rounded-md');
    }
    if (props.type === 'file') {
        cls.push('h-12'); // Adjust the height as needed
    }
    return cls.join(' ');
});

const emit = defineEmits(['update:modelValue', 'change']);

const preview = ref(null);

function handleFileChange(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview.value = e.target.result;
            emit('update:modelValue', file);
            emit('change', file);
        };
        reader.readAsDataURL(file);
    } else {
        preview.value = null;
    }
}

watch(() => props.modelValue, (newVal) => {
    if (newVal instanceof File) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview.value = e.target.result;
        };
        reader.readAsDataURL(newVal);
    } else {
        preview.value = null;
    }
}, { immediate: true });
</script>

<style scoped>
input[type="file"] {
    cursor: pointer;
    position: relative;
    padding-right: 4rem; /* Adjust based on the image width */
    padding: 1rem;
    height: 8rem; /* Increase height as needed */
    line-height: 5rem; /* Match the increased height */
}

input[type=file]::file-selector-button {
    color: black;
    border-radius: 10px;
    border: 1px solid #6b7280;
    opacity: 50%;
    margin: 0.5rem;
    cursor: pointer;
}

input[type="file"] + img {
    right: 2rem;
    width: 6rem;
    padding: 0.5rem;
    border-radius: 15px;
}
</style>
