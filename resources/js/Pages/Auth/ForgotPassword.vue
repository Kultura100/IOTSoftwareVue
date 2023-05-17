<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head :title="__('profile.forgotpassword.title')" />
    <AppLayout :title="__('profile.forgotpassword.title')">
        <div class="text-5xl antialiased uppercase text-center p-5 text-white">{{__('profile.forgotpassword.title')}}</div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center pt-5">
            <div class="rounded-md text-left p-6" style="background: rgba(0,0,0,0.2);">
        <div class="mb-4 text-sm text-white">
            {{__('profile.forgotpassword.description')}}
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" :value="__('profile.register.fields.email')" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{__('profile.forgotpassword.reset')}}
                </PrimaryButton>
            </div>
        </form>
            </div>
    </div>
    </AppLayout>
</template>
