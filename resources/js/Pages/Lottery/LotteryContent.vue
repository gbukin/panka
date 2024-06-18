<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {onMounted, ref} from "vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Head} from "@inertiajs/vue3";

const props = defineProps({
    lottery: {
        type: Object,
    },
    prizes: {
        type: Array,
        default: []
    }
});

const htmlInputState = ref([]);
const lastOpenedInputKey = ref(null);
const lastOpenedInputValue = ref(null);

function openInput(key) {
    const oldKey = lastOpenedInputKey.value;
    const oldValue = lastOpenedInputValue.value;

    if (oldKey !== null) {
        htmlInputState.value[oldKey] = false;

        if (oldValue !== props.prizes[oldKey]) {
            axios.post(
                route('lottery.prize.update', {'prize': props.prizes[oldKey].id}),
                {
                    field: 'html_url',
                    html_url: props.prizes[oldKey].html
                }
            );
        }
    }

    if (key === -1) {
        return;
    }

    htmlInputState.value[key] = true;
    lastOpenedInputKey.value = key;
    lastOpenedInputValue.value = props.prizes[key].html;
}

function drawLottery()
{
    axios.post(route('lottery.draw.all', {lottery: props.lottery.id}))
        .then((response) => {
            if (response.status === 200) {
                window.location.href
            }
        })
}

onMounted(() => {
    for (const prize in props.prizes) {
        htmlInputState.value.push(false);
    }
});

</script>

<template>
    <Head title="Lottery Prizes"/>

    <AuthenticatedLayout>
        <div class="py-12 px-1 md:px-6">
            <section class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 py-2 px-1 bg-white border rounded shadow">
                <h2 class="text-xl text-center mt-4">{{ lottery.name }}</h2>

                <hr class="my-4">
                    <PrimaryButton @click="drawLottery">Draw all</PrimaryButton>
                <hr class="my-4">

                <div class="bg-white overflow-hidden shadow-sm">
                    <div
                        class="px-2 text-center grid grid-cols-10 bg-slate-600 text-white divide-x divide-slate-700 font-bold rounded-t-lg">
                        <p class="p-2 col-span-2">Name</p>
                        <p class="p-2 col-span-3">HTML-page URL</p>
                        <p class="p-2 col-span-3">QR</p>
                        <p class="p-2">Redeem status</p>
                        <p class="p-2">1</p>
                    </div>
                    <div v-for="(prize, key) in prizes"
                         :class="{'md:rounded-b-lg': prizes.length === key + 1}"
                         class="md:px-2 grid grid-cols-10 border border-slate-900">

                        <p class="p-2 col-span-2">{{ prize.name }}</p>

                        <p class="p-2 col-span-3 hover:bg-gray-300 cursor-pointer">
                            <span v-if="!htmlInputState[key]"
                                  class="flex justify-between"
                                  @click="openInput(key)">
                                <span>{{ prize.html }}</span>
                                <PrimaryButton class="ml-1" @click="openInput(key)">Edit</PrimaryButton>
                            </span>
                            <span v-else class="flex items-center">
                                <TextInput v-model="prize.html"
                                           class="w-fit p-1"
                                           @blur="openInput(-1)"
                                           @keydown.enter="openInput(-1)"
                                           autofocus/>
                                <PrimaryButton class="ml-1" @click="openInput(-1)">Save</PrimaryButton>
                            </span>
                        </p>
                        <p class="p-2 col-span-3">{{ prize.url }}</p>

                        <p class="p-2">{{ prize.status }}</p>
                        <p class="p-2">1</p>
                    </div>
                </div>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
