<script setup>
import {Head} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {nextTick, ref} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DialogModal from "@/Components/Selfmade/DialogModal.vue";

const props = defineProps({
    /** @type {Array}
     * @prop {String} gift
     * @prop {Array} lazada_lottery
     */
    items: {
        type: Array,
        required: true
    }
});

const items = props.items;

const updatedRow = ref(null);
const updatedRowValue = ref(null);

function editPrizeRow(key) {
    if (items[key].lazada_lottery) {
        return;
    }

    updatedRowValue.value = null;

    if (updatedRow.value !== key) {
        updatedRow.value = key;
    }

    nextTick(() => {
        document.getElementById(`input` + key.toString()).focus()
    });
}

const openDialog = ref(false);
const errorMessage = ref(null);

function updatePrizeRow(key) {
    const prizeID = items[key].id

    axios
        .post(route('lazada-lottery-prizes.update'), {'id': prizeID, 'lazada_id': updatedRowValue.value})
        .then(() => {
            location.reload();
        })
        .catch((err) => {
            if (err.response.status === 404 || err.response.status === 400) {
                errorMessage.value = err.response.data.message;
                openDialog.value = true;
            }
        });

    updatedRow.value = null;
    updatedRowValue.value = null;
}

</script>

<template>
    <Head title="Lazada Lottery Prizes Table"/>

    <AuthenticatedLayout>
        <div class="py-12 px-1 md:px-6">
            <DialogModal :show="openDialog"
                         v-on:close="openDialog = !openDialog; errorMessage = null"
                         title="Error!">
                <div class="flex items-center justify-between flex-col md:flex-row gap-x-2">
                    <h1>{{errorMessage}}</h1>
                </div>
            </DialogModal>
            <section class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 py-2 px-1 bg-white border rounded shadow">
                <div class="bg-white overflow-hidden shadow-sm hidden sm:block">
                    <div
                        class="px-2 text-center grid grid-cols-6 bg-slate-600 text-white divide-x divide-slate-700 font-bold rounded-t-lg">
                        <p class="p-2">Gift</p>
                        <p class="p-2">ID Number</p>
                        <p class="p-2">Order number</p>
                        <p class="p-2">Customer name</p>
                        <p class="p-2">Delivery city</p>
                        <p class="p-2">Prize given</p>
                    </div>
                    <div v-for="(item, key) in items" v-if="items.length"
                         class="grid grid-cols-6 border border-slate-900">
                        <p class="p-2">{{ item.gift }}</p>
                        <p class="p-2" :class="{'hover:bg-gray-100 cursor-pointer': updatedRow !== key && !item.lazada_lottery}" @click="editPrizeRow(key)">
                            <span v-if="updatedRow !== key">{{ item.lazada_lottery?.id }}</span>
                            <span v-else class="flex flex-col">
                                <input type="text" v-model="updatedRowValue" :id="`input` + key.toString()">
                                <PrimaryButton class="w-full" @click="updatePrizeRow(key)">
                                    <span class="mx-auto">Update</span>
                                </PrimaryButton>
                            </span>
                        </p>
                        <p class="p-2" :class="{'bg-slate-400': !item.lazada_lottery}">{{ item.lazada_lottery?.order_number }}</p>
                        <p class="p-2" :class="{'bg-slate-400': !item.lazada_lottery}">{{ item.lazada_lottery?.customer_name }}</p>
                        <p class="p-2" :class="{'bg-slate-400': !item.lazada_lottery}">{{ item.lazada_lottery?.delivery_city }}</p>
                        <p class="p-2" :class="{'bg-slate-400': !item.lazada_lottery}">{{item.lazada_lottery?.prize_given ? 'Given' : 'Not given'}}</p>
                    </div>
                    <div v-else>
                        <div class="p-2 text-center">No records found</div>
                    </div>
                </div>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
