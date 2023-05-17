<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { VueRecaptcha } from 'vue-recaptcha';
import Checkbox from '@/Components/Checkbox.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Components/Button.vue";
import InputError from "@/Components/InputError.vue";
export default {
    name: "Register",
    components: {
        AppLayout,
        Head,
        Link,
        JetButton,
        InputError,
        Checkbox,
        InputLabel,
        TextInput,
        PrimaryButton,
        VueRecaptcha,
        useForm,
    },
    props: [],
    setup() {
        const form = useForm({
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            terms: false,
            captcha: null,
        })
    return { form }
    },
    methods: {
        onSubmit() {
                this.form.transform(data => ({
                ...data,
            })).post(route('register'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            });
        },
        setVerify(response){
            this.form.captcha = response;
        },
        onExpired(){
            this.form.captcha = null;
        },
    },
};
</script>

<template>
    <Head :title="__('profile.register.routename')" />

    <AppLayout :title="__('profile.register.routename')">
        <div class="text-4xl uppercase text-center p-5 text-white">{{ __('profile.register.title')}}</div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center pt-5">
            <div class="rounded-md text-left p-6" style="background: rgba(0,0,0,0.2);">

        <form @submit.prevent="onSubmit">
            <div>
                <InputLabel for="name" :value="__('profile.register.fields.name')" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" :value="__('profile.register.fields.email')" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" :value="__('profile.register.fields.password')" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" :value="__('profile.register.fields.passwordconfirm')" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>
            <div class="mt-4">
            <InputLabel :value="__('profile.register.fields.captcha')" />
            <vue-recaptcha class="mt-1" :sitekey="$page.props.captcha_key"
                            @verify="setVerify" @expired="onExpired"></vue-recaptcha>
            <InputError class="mt-2" :message="form.errors.captcha" />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>
            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-white hover:text-gray-900">
                    {{__('profile.register.accountexists')}}
                </Link>
                

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{__('profile.register.register')}}
                </PrimaryButton>
            </div>
        </form>
            </div>
    </div>
    </AppLayout>
</template>
