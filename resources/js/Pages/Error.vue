<template>
    <div class="bg-gray-100 flex items-center px-4 py-4 rounded-md" style="background-color: #222831;">
        <div class="container flex flex-col md:flex-col items-center justify-center px-5 text-white">
            <div class="max-w-md">
                <div class="text-5xl font-bold self-center">{{ title }}</div>
                <!-- <p class="text-2xl md:text-3xl font-light leading-normal">{{ description }}</p>
                <p class="mb-8">But dont worry, you can find plenty of other things on our homepage.</p> -->
                <Button v-on:click="strona()">Powrót na strone główna</Button>
            </div>
        </div>
    </div>
</template>
<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Button from '@/Components/Button.vue';
import { Inertia } from '@inertiajs/inertia'
export default {
    props: ["status"],
    components: {
        ApplicationLogo,
        Button,
    },
    computed: {
        title() {
            return {
                503: '5 0 3',
                500: '5 0 0',
                404: '4 0 4',
                403: '4 0 3',
            }[this.status]
        },
        description() {
            return {
                503: 'Sorry, we are doing some maintenance. Please check back soon.',
                500: 'Whoops, something went wrong on our servers.',
                404: 'Sorry, the page you are looking for could not be found.',
                403: 'Sorry, you are forbidden from accessing this page.',
            }[this.status]
        },
    },
    methods: {
        strona() {
            Inertia.visit(route("dashboard"));
        }
    }
}
</script>