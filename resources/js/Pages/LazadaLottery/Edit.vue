<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    prize: {
        type: Object,
    }
});

const prize = props.prize;

const form = useForm({
    id: prize.id,
    order_date: prize.order_date,
    order_number: prize.order_number,
    customer_name: prize.customer_name,
    delivery_city: prize.delivery_city,
    phone: prize.phone,
});
</script>

<template>
    <Head title="Edit lottery prize"/>

    <AuthenticatedLayout>
        <div class="py-12 px-1 md:px-6">
            <section class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 py-2 px-1 bg-white border rounded shadow">
                <form @submit.prevent="form.put(route('lazada-lottery.prize-update'))" class="flex flex-col gap-x-2 space-y-4 my-6">
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

                    <div class="mt-1">
                        <PrimaryButton class="w-full"><span class="text-center w-full">Update</span></PrimaryButton>
                    </div>
                </form>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
