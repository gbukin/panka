<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import {onMounted, ref} from "vue";
import axios from "axios";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    prizes: {
        type: Array,
        required: true
    }
});

const prizes = props.prizes;

onMounted(() => {
});

</script>

<template>
    <Head title="Lotteries"/>

    <AuthenticatedLayout>
        <div class="py-12 px-1 md:px-6">
            <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2 px-1 bg-white border rounded shadow">
                <a :href="route('prizes.create')" class="block my-2">
                    <button class="bg-slate-700 text-white p-1 px-1 md:p-2 rounded-md shadow hover:bg-slate-600">
                        New prize
                    </button>
                </a>

                <div class="bg-white overflow-hidden shadow-sm">
                    <div
                        class="grid grid-cols-4 gap-x-2 bg-gray-500 text-white rounded-t-md">
                        <p class="p-2">#</p>
                        <p class="p-2">Name</p>
                        <p class="p-2">Image</p>
                        <p class="p-2">Preview</p>
                    </div>
                    <div class="grid grid-cols-4 gap-x-2" v-for="prize in prizes">
                        <p class="p-2">{{ prize.id }}</p>
                        <p class="p-2">{{ prize.name }}</p>
                        <p class="p-2">{{ prize.image }}</p>
                        <p class="p-2"><PrimaryButton>Show</PrimaryButton></p>
                    </div>
                </div>
            </section>
        </div>
    </AuthenticatedLayout>
</template>
