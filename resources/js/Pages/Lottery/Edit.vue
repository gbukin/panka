<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {onMounted, ref} from "vue";

const props = defineProps({
    lottery: {
        type: Object,
    },
    prizes: {
        type: Array
    }
});

const lottery = props.lottery;

const form = useForm({
    name: lottery.name,
});

const excelForm = useForm({
    excel: null
});

const prizesForm = useForm({
    prizes: [],
    amount: []
})

function validatePrizeAmount(key) {
    if (prizesForm.amount[key] > 1000) {
        prizesForm.amount[key] = 1000;
    }

    if(prizesForm.amount[key] < 1) {
        prizesForm.amount[key] = 1;
    }
}

onMounted(() => {
    // Key is amount too
    for (const key in props.prizes) {
        prizesForm.prizes.push(props.prizes[key]);
        prizesForm.amount.push(key);
    }
});

</script>

<template>
    <Head title="Create lottery"/>

    <AuthenticatedLayout>
        <div class="py-12 px-6">
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 bg-white border rounded shadow">
                <div>
                    <h2 class="text-lg font-bold mb-2 border-b border-slate-800 w-fit">Info</h2>
                    <form @submit.prevent="form.post(route('lottery.update', {lottery: lottery.id}))" class="space-y-6">
                        <div>
                            <InputLabel for="name" value="Name" />

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                            />

                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Update</PrimaryButton>
                        </div>
                    </form>

                    <hr class="my-6">

                    <h2 class="text-lg font-bold mb-2 border-b border-slate-800 w-fit">Excel with QR</h2>
                    <form @submit.prevent="excelForm.post(route('lottery.upload_excel', {lottery: lottery.id}))" class="space-y-6">
                        <div>
                            <InputLabel for="name" value="Upload excel" />

                            <input
                                id="file"
                                type="file"
                                class="mt-1"
                                @input="excelForm.excel = $event.target.files[0]"
                                required
                            />

                            <InputError class="mt-2" :message="excelForm.errors.name" />
                        </div>

                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="excelForm.processing">Upload</PrimaryButton>
                        </div>
                    </form>

                    <hr class="my-6">

                    <h2 class="text-lg font-bold mb-2 border-b border-slate-800 w-fit">Prizes</h2>
                    <form @submit.prevent="console.log(prizesForm)" class="space-y-6">
                        <div v-for="(prize, key) of prizesForm.prizes">
                            <InputLabel :for="'prize_' + key" value="LotteryPrize / Amount" />

                            <input
                                type="text"
                                class="mt-1"
                                v-model="prizesForm.prizes[key]"
                                required
                            />

                            <input type="number"
                                   @input="validatePrizeAmount(key)"
                                   v-model="prizesForm.amount[key]"
                                   required
                                   placeholder="1-1000"
                           />


                            <InputError class="mt-2" :message="prizesForm.errors.name" />
                        </div>

                        <div class="flex items-center gap-4 mt-4">
                            <PrimaryButton :disabled="prizesForm.processing">Save</PrimaryButton>
                            <PrimaryButton type="button" @click="prizesForm.prizes.push('New prize'); prizesForm.amount.push(1)">Add prize</PrimaryButton>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
