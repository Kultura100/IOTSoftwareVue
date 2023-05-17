<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
// Custom importy
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>

    <Head :title="__('profile.login.title')" />
    <AppLayout :title="__('profile.login.title')">
        <div class="text-4xl uppercase text-center p-5 text-white">{{__('profile.login.title')}}</div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center pt-5">
            <div class="rounded-md text-left p-6" style="background: rgba(0,0,0,0.2);">
                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" :value="__('profile.register.fields.name')" />
                        <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required
                            autofocus />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password" :value="__('profile.register.fields.password')" />
                        <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full"
                            required autocomplete="current-password" />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="block mt-4">
                        <label class="flex items-center mt-2">
                            <Checkbox v-model:checked="form.remember" name="remember" />
                            <span class="ml-2 text-sm text-white">{{__('profile.login.rememberme')}}</span>
                        </label>

                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <Link v-if="canResetPassword" :href="route('password.request')"
                            class="underline text-sm text-white hover:text-gray-900">
                            {{__('profile.login.forgot')}}
                        </Link>
                        <Link :href="route('register')"
                            class="ml-2 underline text-sm text-white hover:text-gray-900">
                            {{__('profile.login.register')}}
                        </Link>
                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            {{__('profile.login.login')}}
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>
