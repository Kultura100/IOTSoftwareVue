<template>
        <div class="flex flex-col rounded-md justify-center lg:p-4 p-2 m-2" style="background: rgba(0,0,0,0.2);">
        <div class="flex flex-col lg:flex-row justify-center">
            <div class="lg:w-1/4 w-full flex justify-center">
                <div class="max-w-sm rounded-sm overflow-hidden shadow-lg">
                    <div class="h-[25.5rem] bg-cover hover:bg-gray"
                        style="background-image: url('storage/images/step1.png')">
                    </div>
                    <div class="mx-6 my-4 text-white">
                        <div class="font-medium text-base text-gray-darker mb-4 align-middle text-center">{{ __('dashboard.receiverpanel.add.tutorial.step1title')}}</div>
                        <p class="font-normal text-gray-dark text-sm mb-2">
                            {{ __('dashboard.receiverpanel.add.tutorial.step1description')}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/4 w-full flex justify-center">
                <div class="max-w-sm rounded-sm overflow-hidden shadow-lg mt-2">
                    <div class="h-[25rem] bg-cover hover:bg-gray"
                        style="background-image: url('storage/images/step2.png')">
                    </div>
                    <div class="mx-6 my-4 text-white">
                        <div class="font-medium text-base text-gray-darker mb-4 align-middle text-center">{{ __('dashboard.receiverpanel.add.tutorial.step2title')}}</div>
                        <p class="font-normal text-gray-dark text-sm mb-2">
                            {{ __('dashboard.receiverpanel.add.tutorial.step2description')}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/4 w-full flex justify-center">
                <div class="max-w-sm rounded-sm overflow-hidden shadow-lg mt-2">
                    <div class="h-[25rem] bg-cover hover:bg-gray"
                        style="background-image: url('storage/images/step3.png')">
                    </div>
                    <div class="mx-6 my-4 text-white">
                        <div class="font-medium text-base text-gray-darker mb-4 align-middle text-center">{{ __('dashboard.receiverpanel.add.tutorial.step3title')}}</div>
                        <p class="font-normal text-gray-dark text-sm mb-2">
                            {{ __('dashboard.receiverpanel.add.tutorial.step3description')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Components/Button.vue";
export default {
    name: "ReceiverHelper",
    components: {
        AppLayout,
        JetButton,
    },
    props: [],
    setup() {
    },
    mounted() {

    },
    methods: {
    },
};
</script>