<script setup>
import {onMounted, ref, watch} from "vue";

const props = defineProps({
    items: {
        type: Array,
        required: true
    },
    default: {
        type: String,
        required: true
    }
})

const input = ref('');
const open = ref(false);
const filteredItems = ref([]);

const emit = defineEmits(['update:selected'])

function handleOpen() {
    open.value = input.value !== null && input.value.length >= 3;

    filterItems();
}

function handleBlur() {
    setTimeout(() => {
        cleanVoidInput();
    }, 200);
}

function handleClose(item = null) {
    if (item !== null) {
        input.value = item;
        emit('update:selected', {new: item, old: props.default});
    }

    cleanVoidInput();

    open.value = false;
}

function cleanVoidInput() {
    if (input.value !== null && !props.items.includes(input.value) || input.value === '') {
        input.value = null;
    }

    filterItems();
}

function filterItems() {
    filteredItems.value = [];

    for (const key in props.items) {
        if (input.value == null || props.items[key].includes(input.value)) {
            filteredItems.value.push(props.items[key]);
        }
    }
}

watch(() => props.default, (newValue, oldValue) => {
    input.value = newValue;
});

onMounted(() => {
    // refs don`t exists in onMounted, they init later
    setTimeout(() => {
        filterItems();
        input.value = props.default;
    }, 50);
})
</script>

<template>
    <div>
        <input type="text"
               class="border border-slate-800 w-full"
               placeholder="Write minimum 3 char"
               v-model="input"
               @input="handleOpen()"
               >
        <div class="flex flex-col bg-white absolute" v-if="open">
            <p v-for="item in filteredItems"
               class="pl-2 border border-slate-500 hover:bg-slate-300 hover:cursor-pointer relative z-10"
               @click="handleClose(item)"
            >
                {{ item }}
            </p>
        </div>
    </div>
</template>

<style scoped>

</style>
