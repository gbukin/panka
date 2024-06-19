<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import {onMounted, ref} from "vue";
import axios from "axios";


const lotteries = ref([]);

const searchInput = ref(null);

function search() {
    axios.get(
        route('lotteries.index'),
        {
            params: {
                search: searchInput.value
            }
        }).then((response) => {
            lotteries.value = response.data;
        }
    );
}

onMounted(() => {
    axios.get(route('lotteries.index')).then((response) => {
        lotteries.value = response.data;
    })
});

</script>

<template>
    <Head title="Lotteries"/>

    <AuthenticatedLayout>
        <div class="py-12 px-1 md:px-6">
            <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2 px-1 bg-white border rounded shadow">
                <div class="flex justify-around items-center gap-x-2 mb-4">
                    <div id="createLottery">
                        <a :href="route('lottery.create')">
                            <button class="bg-slate-700 text-white p-2 md:p-3 rounded-md shadow hover:bg-slate-600">
                                New
                            </button>
                        </a>
                    </div>
                    <div id="search"
                         class="bg-white text-black ml-auto rounded-md shadow-md p-0 md:p-1 border border-slate-200 hover:border-slate-400 grid grid-cols-6">
                        <input type="text"
                               @keyup.enter="search"
                               v-model="searchInput"
                               class="border-transparent focus:border-transparent focus:ring-0 col-span-5"
                               placeholder="Search">
                        <button
                            class="font-bold border-2 rounded-full p-0 md:p-2 hover:text-slate-600 hover:border-slate-600"
                            @click="search">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="size-6 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm">
                    <div
                        class="px-2 text-center grid grid-cols-11 bg-slate-600 text-white divide-x divide-slate-700 font-bold rounded-t-lg">
                        <p class="p-2">#</p>
                        <p class="p-2 col-span-6">Name</p>
                        <p class="p-2">Created</p>
                        <p class="p-2">Draw accepted</p>
                        <p class="p-2"></p>
                        <p class="p-2"></p>
                    </div>
                    <div v-for="(lottery, key) in lotteries"
                         v-if="lotteries.length > 0"
                         :class="{'md:rounded-b-lg': lotteries.length === key + 1}"
                         class="md:px-2 grid grid-cols-11 border border-slate-900 mb-1 md:mb-0">
                        <p class="p-2 text-center">{{ lottery.id }}</p>
                        <p class="p-2 col-span-6">{{ lottery.name }}</p>
                        <p class="p-2">{{ lottery.created }}</p>
                        <p class="p-2">{{ lottery.ready ? 'Yes' : 'No' }}</p>
                        <a :href="route('lottery.show', {'lottery': lottery.id})"
                           :class="{'col-span-2': lottery.ready || !lottery.is_draw}"
                           class="flex items-center justify-center md:hover:text-green-800 mt-2 md:mt-0">
                            <button class="w-full h-full rounded bg-slate-700 text-white shadow hover:bg-slate-600 border border-r-white py-2">Open</button>
                        </a>
                        <a :href="route('lottery.prize.edit', {'lottery': lottery.id})" v-if="!lottery.ready && lottery.is_draw" class="flex items-center justify-center md:hover:text-green-800 mt-2 md:mt-0 col-span-5 md:col-span-1">
                            <button class="w-full h-full rounded bg-slate-700 text-white shadow hover:bg-slate-600 border border-r-white py-2">Edit</button>
                        </a>
                    </div>
                    <div v-else
                         class="font-bold border border-slate-800 rounded-b-lg text-center py-4">
                        No lotteries created yet
                    </div>
                </div>
            </section>
        </div>
    </AuthenticatedLayout>
</template>
