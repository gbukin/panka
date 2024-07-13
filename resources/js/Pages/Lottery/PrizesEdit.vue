<script setup>
import {Head, Link} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DropdownWithSearch from "@/Components/Selfmade/DropdownWithSearch.vue";
import {onMounted, ref} from "vue";
import axios from "axios";

const props = defineProps({
    lottery: {
        type: Object,
    },
    links: {
        type: Array
    },
    prizes: {
        type: Array
    }
})

let url = ref([]);

const refPrizes = ref(props.prizes);

function replaceUrl(data) {
    if (data.new === data.old) {
        return;
    }

    let switchPrizeKey = 0;
    let targetPrizeKey = 0;

    for (const prizesKey in refPrizes.value) {
        if (refPrizes.value[prizesKey].url === data.new) {
            switchPrizeKey = prizesKey;
        }

        if (refPrizes.value[prizesKey].url === data.old) {
            targetPrizeKey = prizesKey;
        }
    }

    refPrizes.value[switchPrizeKey].url = data.old;
    refPrizes.value[targetPrizeKey].url = data.new;

    axios
        .post(
            route('lottery.prize.update', {prize: refPrizes.value[switchPrizeKey].id}),
            {url: data.old}
        )
        .then((response) => {
            console.log(response);
        });

    axios
        .post(
            route('lottery.prize.update', {prize: refPrizes.value[targetPrizeKey].id}),
            {url: data.new}
        )
        .then((response) => {
            console.log(response);
        });
}

onMounted(() => {
    for (const key in props.links) {
        url.value.push(props.links[key].url);
    }
})
</script>

<template>
    <Head title="Lotteries"/>

    <AuthenticatedLayout>
        <div class="py-12 px-1 md:px-6">
            <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2 px-1 bg-white border rounded shadow">
                <h1 class="text-2xl text-center my-2">Edit QR to LotteryPrize relation</h1>
                <hr>
                <div class="font-bold text-lg mt-2">{{ lottery.name }}</div>

                <hr class="my-4">

                <p class="mb-2 text-lg font-bold">Prizes: {{ prizes.length }}</p>

                <div class="col-span-11">
                    <section class="grid grid-cols-2 gap-x-4">
                        <div v-for="prize in refPrizes">
                            <p class="">{{ prize.name }}:</p>
                            <DropdownWithSearch class=""
                                                v-on:update:selected="replaceUrl($event)"
                                                :default="prize.url"
                                                :items="url"/>
                        </div>
                    </section>
                </div>

                <div class="mt-6">
                    <Link method="post" :href="route('lottery.update', {lottery: lottery.id})">
                        <button class="bg-slate-700 text-white px-10 py-2 rounded-md shadow hover:bg-slate-600">
                            Accept lottery draw
                        </button>
                    </Link>
                </div>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
