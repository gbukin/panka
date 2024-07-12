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
    prize_given: 0,
    amount: 1
});

function addRecords() {
    form.post(route('lazada-lottery-store'));

    form.reset();
}

onMounted(() => {
});

</script>

<template>
    <Head title="Lottery Prizes"/>

    <AuthenticatedLayout>
        <div class="py-12 px-1 md:px-6">
            <section class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 py-2 px-1 bg-white border rounded shadow">
                <form @submit.prevent="addRecords" class="flex gap-x-2">
                    <div class="flex flex-col">
                        <InputLabel value="Order date"/>
                        <TextInput type="date" v-model="form.order_date" required/>
                    </div>
                    <div class="flex flex-col">
                        <InputLabel value="Order number"/>
                        <TextInput v-model="form.order_number" required/>
                    </div>
                    <div class="flex flex-col">
                        <InputLabel value="Customer name"/>
                        <TextInput v-model="form.customer_name" required/>
                    </div>
                    <div class="flex flex-col">
                        <InputLabel value="Delivery city"/>
                        <TextInput v-model="form.delivery_city" required/>
                    </div>

                    <div class="flex flex-col">
                        <InputLabel value="Amount"/>
                        <TextInput type="number" class="w-16" min="1" v-model="form.amount" required/>
                    </div>

                    <div class="flex flex-col ml-auto">
                        <span>&nbsp;</span>
                        <PrimaryButton>Add</PrimaryButton>
                    </div>
                </form>

                <hr class="my-4">

                <div class="bg-white overflow-hidden shadow-sm">
                    <div
                        class="px-2 text-center grid grid-cols-6 bg-slate-600 text-white divide-x divide-slate-700 font-bold rounded-t-lg">
                        <p class="p-2">Присвоенный номер / <br>Assigned Number</p>
                        <p class="p-2">Дата заказа / <br>Order date</p>
                        <p class="p-2">Номер заказа / <br>Order number</p>
                        <p class="p-2">Имя заказчика / <br>Customer name</p>
                        <p class="p-2">Город доставки / <br>Delivery city</p>
                        <p class="p-2">Приз выдан / <br>Prize given</p>
                    </div>
                    <div v-for="(item, key) in items"
                         class="md:px-2 grid grid-cols-6 border border-slate-900">

                        <p class="p-2 ml-4">{{ item.id }}</p>
                        <p class="p-2 ml-4">{{ item.order_date }}</p>
                        <p class="p-2 ml-4">{{ item.order_number }}</p>
                        <p class="p-2 ml-4">{{ item.customer_name }}</p>
                        <p class="p-2 ml-4">{{ item.delivery_city }}</p>
                        <p class="p-2 ml-4">
                            <PrimaryButton v-if="item.prize_given === 0">Give</PrimaryButton>
                            <PrimaryButton v-else class="bg-green-600 pointer-events-none" disabled>Given</PrimaryButton>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
