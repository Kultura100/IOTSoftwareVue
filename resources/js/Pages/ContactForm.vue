<template>
    <AppLayout :title="__('contactform.routename')">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{__('contactform.routename')}}
            </h2>
        </template>

        <div class="flex flex-col items-center mx-auto rounded-md w-full lg:p-4 lg:w-1/3 mt-2"
            style="background: rgba(0,0,0,0.2);">
            <h2 class="font-bold text-[#1a8eca] text-2xl mb-3"> {{__('contactform.title')}}</h2>
            <form class="w-full max-w-lg mb-3">
                <div class="flex flex-wrap lg:-mx-3 mb-6 mx-2">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                            {{__('contactform.fields.title')}}
                        </label>
                        <input placeholder="Device bug..." v-model="form.title"
                            class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="text">
                        <InputError class="mt-2" :message="$page.props.errors.title" />
                    </div>
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                            {{__('contactform.fields.description')}}
                        </label>
                        <textarea v-model="form.description"  rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            :placeholder="__('contactform.fields.placeholder')"></textarea>
                        <InputError class="mt-1" :message="$page.props.errors.description" />
                    </div>
                </div>
            </form>
            <div>
                <JetButton @click="onSubmit">{{__('contactform.buttontitle')}}</JetButton>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Components/Button.vue";
import InputError from "@/Components/InputError.vue";
import { useForm } from '@inertiajs/inertia-vue3';
export default {
    name: "ReceiverAdd",
    components: {
        AppLayout,
        JetButton,
        InputError,
    },
    props: [],
    setup() {
        const form = useForm({
            title: null,
            description: null,
        })
        return { form }
    },
    methods: {
        onSubmit() {
            this.form.post('/sendbug', {
                onSuccess: () => {
                    this.form.reset();
                    this.$emit("receiverAdd");
                }
            })
        },
    },
};
</script>