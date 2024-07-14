<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import {onMounted, ref} from "vue";

const props = defineProps({
    prize: {
        type: Object,
        required: true,
    }
});

const prize = props.prize;

const form = useForm({
    name: prize.name,
    image: null,
});

const imageUploaded = ref(true);

function clickInput() {
    document.getElementById('imageInput').click();
}

function handleImage(event) {
    const input = event.target;
    form.image = input.files[0];

    const output = document.getElementById('previewImg');

    output.src = URL.createObjectURL(event.target.files[0]);

    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }

    imageUploaded.value = true;
}

onMounted(() => {
    document.getElementById('previewImg').src = prize.image_name
});
</script>

<template>
    <Head title="Lotteries"/>

    <AuthenticatedLayout>
        <div class="py-12 px-1 md:px-6">
            <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2 px-1 bg-white border rounded shadow">
                <form @submit.prevent="form.post(route('prizes.update', {prize: prize.id}))" class="mt-6 space-y-6">
                    <div>
                        <InputLabel for="name" value="Name"/>

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                        />

                        <InputError class="mt-2" :message="form.errors.name"/>
                    </div>

                    <div>
                        <InputLabel for="image" value="Image"/>

                        <input @change="handleImage($event)"
                               type="file"
                               id="imageInput"
                               hidden>

                        <PrimaryButton type="button" @click="clickInput()" class="h-fit">
                            Upload image
                        </PrimaryButton>

                        <div v-show="imageUploaded" class="mt-4 border border-slate-600 w-fit h-fit">
                            <img id='previewImg' class="object-cover max-w-[30rem] max-h-[30rem]"/>
                        </div>

                        <InputError class="mt-2" :message="form.errors.image"/>
                    </div>

                    <div class="flex items-center gap-4">
                        <PrimaryButton :disabled="form.processing"
                                       class="bg-green-700 hover:bg-green-800 active:bg-green-800 focus:bg-green-800">
                            Save
                        </PrimaryButton>

                        <Transition
                            enter-active-class="transition ease-in-out"
                            enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out"
                            leave-to-class="opacity-0"
                        >
                            <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                        </Transition>
                    </div>
                </form>
            </section>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
