<script setup>
import {onMounted, ref, watch} from "vue";

const props = defineProps({
    items: {
        type: Array,
        required: true
    }
})

const open = ref(false);

const emit = defineEmits(['update:selected'])

const selected = ref(null);

function handleOpen() {
    open.value = true;


}

function handleClose(key = null) {
    open.value = false;

    if (key === null) {
        return;
    }

    emit('update:selected', {id: props.items[key].id, name: props.items[key].name});
    selected.value = props.items[key];
}

onMounted(() => {
})
</script>

<template>
    <section>
        <div class="h-full w-full z-10 bg-transparent absolute inset-0" v-show="open" @click="handleClose()">
        </div>

        <div class="z-20">
            <div class="border border-slate-300 w-full text-gray-500 p-2 rounded-md cursor-pointer"
                 @click="handleOpen">
            <span v-if="selected"
                  class="text-black">
                {{ selected.name }}
            </span>
                <span v-else>Click to open list of prizes</span>
            </div>
            <div class="flex flex-col bg-white absolute" v-show="open">
                <p v-for="(item, key) in items"
                   class="p-1 border border-slate-500 hover:bg-slate-300 hover:cursor-pointer relative z-10"
                   @click="handleClose(key)"
                >
                    <span class="border-b border-slate-800">{{ item.name }}</span>
                    <img :src="item.image_path" class="w-16 h-16 mx-auto">
                </p>
            </div>
        </div>
    </section>
</template>

<style scoped>

</style>
