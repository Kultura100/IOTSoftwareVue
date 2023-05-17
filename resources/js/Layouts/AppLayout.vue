<script setup>
    import {
        Head
    } from '@inertiajs/inertia-vue3';
    import JetBanner from '@/Components/Banner.vue';
    import Navigation from '@/Pages/Pieces/Navigation.vue';
    import LeftMenu from '@/Pages/Pieces/LeftMenu.vue';
    import Toasts from "@/Components/Toasts.vue";

    defineProps({
        title: String,
    });

</script>

<style>

    .buttonstyle:hover{
        transition: 0.3s;
        background-color: white;
        color:black;
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

    .rain__drop {
        animation-delay: calc(var(--d) * 1s);
        animation-duration: calc(var(--a) * 1s);
        animation-iteration-count: infinite;
        animation-name: drop;
        animation-timing-function: linear;
        height: 30px;
        left: calc(var(--x) * 1%);
        position: absolute;
        top: calc((var(--y) + 50) * -1px);
    }

    .rain__drop path {
        fill: #a1c6cc;
        opacity: var(--o);
        transform: scaleY(calc(var(--s) * 1.5));
    }

    @-moz-keyframes drop {
        90% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: translateY(100vh);
        }
    }

    @-webkit-keyframes drop {
        90% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: translateY(100vh);
        }
    }

    @-o-keyframes drop {
        90% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: translateY(100vh);
        }
    }

    @keyframes drop {
        90% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: translateY(100vh);
        }
    }

</style>

<template>
    <Head title="IOT-Kawczyński Andrzej" />
    <div class="h-screen w-screen flex">
      <LeftMenu :title="title" />
      <div class="flex-1 flex flex-col">
            <Navigation :title="title" />
                <main class="overflow-auto">
                    <slot />
                </main>
            <!-- Page Content -->
          </div>
    </div>
    <Toasts :danger="$page.props.flash.danger" />
    <Toasts :message="$page.props.flash.message" />
</template>
