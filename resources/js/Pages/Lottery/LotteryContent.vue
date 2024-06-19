<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {onMounted, ref} from "vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Head} from "@inertiajs/vue3";
import DialogModal from "@/Components/Selfmade/DialogModal.vue";

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

function drawLottery() {
    axios.post(route('lottery.draw.all', {lottery: props.lottery.id}))
        .then((response) => {
            if (response.status === 200) {
                location.reload();
            }
        })
}

const openDialog = ref(false);
const awardInputValue = ref(null);
const awardPrize = ref(null);

function awardPerson()
{
    axios.post(route('lottery.prize.award', {prize: awardPrize.value.id}), {'redeemer': awardInputValue.value});

    awardPrize.value.redeem = awardInputValue.value;
    awardPrize.value.status = 'Awarded';

    let date = new Date();

    let year = date.getFullYear();
    let month = date.getMonth() + 1;
    let day = date.getDate();

    awardPrize.value.redeem_at = day + "/" + month + "/" + year;

    awardInputValue.value = null;
    openDialog.value = false;
    awardPrize.value = null;
}

function openAwardDialog(prize) {
    openDialog.value = true;
    awardPrize.value = prize;
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
            <DialogModal :show="openDialog"
                         v-on:close="openDialog = !openDialog; awardInputValue = null"
                         title="Give out a prize">
                <div class="flex items-center justify-between flex-col md:flex-row gap-x-2">
                    <input type="text" class="border-b w-full block md:inline md:w-full border-slate-400 hover:border-slate-600" placeholder="Lastname Firstname" v-model="awardInputValue">
                    <PrimaryButton @click="awardPerson" class="mt-4 md:mt-0 w-full md:w-fit"><span class="mx-auto">Give</span></PrimaryButton>
                </div>
            </DialogModal>
            <section class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 py-2 px-1 bg-white border rounded shadow">
                <h2 class="text-xl text-center mt-4">{{ lottery.name }}</h2>

                <hr class="my-4" v-if="!lottery.ready">
                <PrimaryButton v-if="!lottery.is_draw" @click="drawLottery">Draw all</PrimaryButton>
                <a :href="route('lottery.prize.edit', {lottery: lottery.id})" v-if="lottery.is_draw && !lottery.ready">
                    <PrimaryButton>Edit prize QR</PrimaryButton>
                </a>
                <hr class="my-4">

                <div class="bg-white overflow-hidden shadow-sm">
                    <div
                        class="px-2 text-center grid grid-cols-10 bg-slate-600 text-white divide-x divide-slate-700 font-bold rounded-t-lg">
                        <p class="p-2">Name</p>
                        <p class="p-2 col-span-3">HTML-page URL</p>
                        <p class="p-2 col-span-3">QR</p>
                        <p class="p-2">Redeem status</p>
                        <p class="p-2 col-span-2"></p>
                    </div>
                    <div v-for="(prize, key) in prizes"
                         :class="{'md:rounded-b-lg': prizes.length === key + 1}"
                         class="md:px-2 grid grid-cols-10 border border-slate-900">

                        <p class="p-2">{{ prize.name }}</p>

                        <p class="p-2 col-span-3 hover:bg-gray-300 cursor-pointer" v-if="!lottery.ready">
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
                        <p class="p-2 col-span-3" v-else>
                            {{ prize.html }}
                        </p>

                        <p class="p-2 col-span-3">
                            <span v-if="prize.url">
                                {{ prize.url }}
                            </span>
                            <span v-else
                                  class="text-gray-400 text-center block">
                                Please, click "Draw all" first
                            </span>
                        </p>

                        <p class="p-2">{{ prize.status }}</p>
                        <p class="p-2 col-span-2 text-right">
                            <span v-if="lottery.is_draw && lottery.ready">
                                <span v-if="prize.redeem">{{ prize.redeem }}, {{ prize.redeem_at }}</span>
                                <span v-else>
                                    <PrimaryButton @click="openAwardDialog(prize)">Give prize</PrimaryButton>
                                </span>
                            </span>
                        </p>

                    </div>
                </div>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
