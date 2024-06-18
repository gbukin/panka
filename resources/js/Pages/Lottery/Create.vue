<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const samplePrize = {name: '', amount: 1};

const form = useForm({
    name: null,
    excel: null,
    prizes: [samplePrize],
});

function validatePrizeAmount(key) {
    const amount = form.prizes[key].amount;

    if (amount > 1000) {
        form.prizes[key].amount = 1000;
    }

    if (amount < 1) {
        form.prizes[key].amount = 1;
    }
}

function addPrize() {
    form.prizes.push({name: '', amount: 1});
}
</script>

<template>
    <Head title="Create lottery"/>

    <AuthenticatedLayout>
        <div class="py-12 px-6">
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 bg-white border rounded shadow">
                <div>
                    <form @submit.prevent="form.post(route('lottery.store'))" class="space-y-6">
                        <h2 class="text-lg font-bold mb-2 border-b border-slate-800 w-fit">Info</h2>
                        <div>
                            <InputLabel for="name" value="Name"/>

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                            />

                            <InputError class="mt-2" :message="form.errors.name"/>
                        </div>

                        <hr class="my-6">

                        <h2 class="text-lg font-bold mb-2 border-b border-slate-800 w-fit">Excel with QR</h2>
                        <div>
                            <InputLabel for="name" value="Upload excel"/>

                            <input
                                id="file"
                                type="file"
                                class="mt-1"
                                @input="form.excel = $event.target.files[0]"
                                required
                            />

                            <InputError class="mt-2" :message="form.errors.excel"/>
                        </div>

                        <hr class="my-6">

                        <h2 class="text-lg font-bold mb-2 border-b border-slate-800 w-fit">Prizes</h2>
                        <InputError class="mt-2" :message="form.errors.prizes"/>
                        <div v-for="(prize, key) in form.prizes" class="">
                            <div class="grid grid-cols-12 gap-x-2">
                                <InputLabel :for="'prize_' + key"
                                            class="col-span-4"
                                            value="Prize name"/>

                                <InputLabel :for="'prize_' + key"
                                            class="col-span-6"
                                            value="HTML-page URL"/>

                                <InputLabel :for="'prize_' + key"
                                            value="Amount"/>
                            </div>
                            <div class="grid grid-cols-12 gap-x-2">
                                <TextInput type="text"
                                           class="col-span-4"
                                           placeholder="Write prize name..."
                                           v-model="form.prizes[key].name"
                                           required
                                />

                                <TextInput type="text"
                                           v-model="form.prizes[key].html_url"
                                           class="col-span-6"
                                           required
                                />

                                <TextInput type="number"
                                           @input="validatePrizeAmount(key)"
                                           v-model="form.prizes[key].amount"
                                           required
                                           placeholder="1-1000"
                                />

                                <PrimaryButton class="hover:text-red-600"
                                               type="button"
                                               @click="form.prizes.splice(key, 1)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mx-auto">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </PrimaryButton>
                            </div>
                        </div>

                        <PrimaryButton type="button"
                                       @click="addPrize">
                            Add prize
                        </PrimaryButton>

                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Create</PrimaryButton>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
