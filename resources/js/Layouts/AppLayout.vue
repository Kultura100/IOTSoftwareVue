<script setup>
import {
    Head
} from '@inertiajs/inertia-vue3';
import Navigation from '@/Pages/Pieces/Navigation.vue';
import LeftMenu from '@/Pages/Pieces/LeftMenu.vue';
import Toasts from "@/Components/Toasts.vue";

defineProps({
    title: String,
});

</script>

<style>
.buttonstyle:hover {
    transition: 0.3s;
    background-color: white;
    color: black;
}

:root {
    --gradient: linear-gradient(135deg, #72EDF2 10%, #5151E5 100%);
}

* {
    line-height: 1.25em;
}

.clear {
    clear: both;
}

body {
    height: 100%;
    width: 100%;
    margin: 0;
    font-family: 'Montserrat', sans-serif;
    background-color: #343d4b !important;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
}

.navigation,
.leftmenu,
.dashboard {
    -webkit-box-shadow: 0 0 70px -10px rgba(0, 0, 0, 0.2);
    box-shadow: 0 0 70px -10px rgba(0, 0, 0, 0.2);
    background-color: #222831;
    color: #ffffff;
}


.leftmenu {
    box-shadow: 0 0 0 0;
}

.dashboard {
    border-radius: 0px 0px 25px 0px;
}
</style>

<template>

    <Head title="IOT-Kawczyński Andrzej" />
    <div class="h-screen w-screen flex overflow-x-auto">
        <LeftMenu :title="title" />
        <div class="flex-1 flex flex-col">
            <Navigation :title="title" />
            <main class="mb-16 lg:mb-0 overflow-y-auto">
                <slot />
            </main>
            <!-- Page Content -->
        </div>
    </div>
    <Toasts :danger="$page.props.flash.danger" />
    <Toasts :message="$page.props.flash.message" />
</template>
