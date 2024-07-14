<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import {ref} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import NavLink from "@/Components/NavLink.vue";

const props = defineProps({
    prizes: {
        type: Array,
        required: true
    }
});

const prizes = props.prizes;

const imageUrl = ref(null);

</script>

<template>
    <div class="h-full w-full z-10 bg-gray-950/50 absolute inset-0"
         @click="imageUrl = null"
         v-show="imageUrl">
    </div>
    <section v-show="imageUrl">
        <div class="z-20 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 border border-gray-950 p-4 rounded-md shadow-lg bg-slate-700"
             @click="imageUrl = null">
            <img :src="imageUrl" class="object-cover max-w-[30rem] max-h-[30rem]"/>
        </div>
    </section>

    <Head title="Lotteries"/>

    <AuthenticatedLayout>
        <div class="py-12 px-1 md:px-6">

            <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2 px-1 bg-white border rounded shadow">
                <a :href="route('prizes.create')" class="block my-2 w-fit">
                    <button class="bg-slate-700 text-white p-1 px-1 md:p-2 rounded-md shadow hover:bg-slate-600">
                        New prize
                    </button>
                </a>

                <div class="bg-white overflow-hidden shadow-sm border-l border-r border-b border-slate-400 rounded-t-md">
                    <div
                        class="grid grid-cols-7 gap-x-2 bg-gray-700 text-white rounded-t-md">
                        <p class="p-2">#</p>
                        <p class="p-2 col-span-2">Name</p>
                        <p class="p-2 col-span-2">Image</p>
                        <p class="p-2">Preview</p>
                        <p class="p-2">Edit</p>
                    </div>
                    <div class="grid grid-cols-7 gap-x-2 border-b border-slate-900"
                         v-for="prize in prizes">
                        <p class="p-2">{{ prize.id }}</p>
                        <p class="p-2 col-span-2">{{ prize.name }}</p>
                        <p class="p-2 col-span-2">
                            <img :src="prize.image"
                                 class="object-cover w-32 h-32 border border-slate-400 rounded-md shadow-md cursor-pointer scale-95 hover:scale-100"
                                 @click="imageUrl = prize.image"
                            />
                        </p>
                        <p class="p-2">
                            <a :href="route('preview-prize', {prize: prize.id})" target="_blank">
                                <PrimaryButton>Show</PrimaryButton>
                            </a>
                        </p>
                        <p class="p-2">
                            <NavLink :href="route('prizes.edit', {prize: prize.id})">
                                <PrimaryButton>Update</PrimaryButton>
                            </NavLink>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </AuthenticatedLayout>
</template>
