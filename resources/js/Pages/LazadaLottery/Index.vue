<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {onMounted} from "vue";
import {Head, useForm} from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import axios from "axios";

const props = defineProps({
    items: {
        type: Object,
    }
});

const form = useForm({
    order_date: null,
    order_number: null,
    customer_name: null,
    delivery_city: null,
    phone: null,
    prize_given: 0,
    amount: 1
});

function addRecords() {
    form.post(route('lazada-lottery-store'));

    form.reset();
}

function givePrize(prize, index) {
    axios.post(route('lazada-lottery-give', {prize: prize})).then(() => {
        props.items[index].prize_given = 1;
    });
}

onMounted(() => {
});

</script>

<template>
    <Head title="Lottery Prizes"/>

    <AuthenticatedLayout>
        <div class="py-12 px-1 md:px-6">
            <section class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 py-2 px-1 bg-white border rounded shadow">
                <form @submit.prevent="addRecords" class="flex flex-col lg:flex-row gap-x-2 space-y-2 sm:space-y-0">
                    <div class="flex flex-col">
                        <InputLabel value="Order date" :required="true"/>
                        <TextInput type="date" v-model="form.order_date" required/>
                    </div>
                    <div class="flex flex-col">
                        <InputLabel value="Order number" :required="true"/>
                        <TextInput v-model="form.order_number" required/>
                    </div>
                    <div class="flex flex-col">
                        <InputLabel value="Customer name" :required="true"/>
                        <TextInput v-model="form.customer_name" required/>
                    </div>
                    <div class="flex flex-col">
                        <InputLabel value="Delivery city" :required="true"/>
                        <TextInput v-model="form.delivery_city" required/>
                    </div>
                    <div class="flex flex-col">
                        <InputLabel value="Phone"/>
                        <TextInput v-model="form.phone"/>
                    </div>

                    <div class="flex flex-col">
                        <InputLabel value="Amount" :required="true"/>
                        <TextInput type="number" class="sm:w-16" min="1" v-model="form.amount" required/>
                    </div>

                    <div class="flex flex-col mt-1 sm:mt-0 sm:ml-auto">
                        <span class="hidden sm:block">&nbsp;</span>
                        <PrimaryButton><span class="text-center w-full">Add</span></PrimaryButton>
                    </div>
                </form>

                <hr class="my-4">

                <div class="bg-white overflow-hidden shadow-sm hidden sm:block">
                    <div
                        class="px-2 text-center grid grid-cols-7 bg-slate-600 text-white divide-x divide-slate-700 font-bold rounded-t-lg">
                        <p class="p-2">Присвоенный номер / <br>Assigned Number</p>
                        <p class="p-2">Дата заказа / <br>Order date</p>
                        <p class="p-2">Номер заказа / <br>Order number</p>
                        <p class="p-2">Имя заказчика / <br>Customer name</p>
                        <p class="p-2">Город доставки / <br>Delivery city</p>
                        <p class="p-2">Телефон / <br>Phone</p>
                        <p class="p-2">Приз выдан / <br>Prize given</p>
                    </div>
                    <div v-for="(item, key) in items" v-if="items.length"
                         class="md:px-2 grid grid-cols-7 border border-slate-900">

                        <p class="p-2 ml-4">{{ item.id }}</p>
                        <p class="p-2 ml-4">{{ item.order_date }}</p>
                        <p class="p-2 ml-4">{{ item.order_number }}</p>
                        <p class="p-2 ml-4">{{ item.customer_name }}</p>
                        <p class="p-2 ml-4">{{ item.delivery_city }}</p>
                        <p class="p-2 ml-4">{{ item.phone }}</p>
                        <p class="p-2 ml-4">
                            <PrimaryButton @click="givePrize(item, key)"
                                           v-if="item.prize_given === 0">
                                Give
                            </PrimaryButton>
                            <PrimaryButton v-else class="bg-green-600 pointer-events-none" disabled>Given</PrimaryButton>
                        </p>
                    </div>
                    <div v-else>
                        <div class="p-2 text-center">No records found</div>
                    </div>
                </div>

                <div class="block sm:hidden space-y-4">
                    <div class="flex flex-col divide-y divide-slate-700 border border-slate-800 rounded-md shadow-md"
                         v-for="(item, key) in items"
                         v-if="items.length">
                        <div class="grid grid-cols-2">
                            <p class="p-2 bg-slate-300">Присвоенный номер / <br>Assigned Number</p>
                            <p class="p-2 ml-4">{{ item.id }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="p-2 bg-slate-300">Дата заказа / <br>Order date</p>
                            <p class="p-2 ml-4">{{ item.order_date }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="p-2 bg-slate-300">Номер заказа / <br>Order number</p>
                            <p class="p-2 ml-4">{{ item.order_number }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="p-2 bg-slate-300">Имя заказчика / <br>Customer name</p>
                            <p class="p-2 ml-4">{{ item.customer_name }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="p-2 bg-slate-300">Город доставки / <br>Delivery city</p>
                            <p class="p-2 ml-4">{{ item.delivery_city }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <p class="p-2 bg-slate-300">Приз выдан / <br>Prize given</p>
                            <p class="p-2 ml-4">
                                <PrimaryButton v-if="item.prize_given === 0"
                                               @click="givePrize(item, key)">
                                    Give
                                </PrimaryButton>
                                <PrimaryButton v-else class="bg-green-600 pointer-events-none" disabled>Given</PrimaryButton>
                            </p>
                        </div>
                    </div>
                    <div v-else>
                        No records found
                    </div>
                </div>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
