<template>
    <div v-if="$page.props.Locale" @mouseleave="mouseleave">
        <button @click="showdialog"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center border rounded-t-lg focus:outline-none bg-gray-700 hover:bg-gray-600 focus:ring-gray-700 text-white border-gray-600">
            <div v-if="$page.props.Locale == 'pl'" class="inline-flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20">
                    <path style="fill:#ffffff; stroke:none;" d="M0 0L0 10L32 10L32 0L0 0z" />
                    <path style="fill:#dd153d; stroke:none;" d="M0 10L0 20L32 20L32 10L0 10z" />
                </svg>
                PL
            </div>
            <div v-else-if="$page.props.Locale == 'en'" class="inline-flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20">
                    <path style="fill:#cc203c; stroke:none;" d="M0 0L9 6L9 5L0 0z" />
                    <path style="fill:#f8f5f7; stroke:none;" d="M1 0L1 1L14 7L14 0L13 0L13 5L1 0z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M4 0L5 1L4 0z" />
                    <path style="fill:#143274; stroke:none;" d="M5 0L5 1L13 5L13 0L5 0z" />
                    <path style="fill:#cc203c; stroke:none;"
                        d="M14 0L14 8L0 8L0 11L14 11L14 19L18 19L18 11L32 11L32 8L18 8L18 0L14 0z" />
                    <path style="fill:#f8f5f7; stroke:none;" d="M18 0L18 7L19 7L18 0z" />
                    <path style="fill:#143274; stroke:none;" d="M19 0L19 5L27 1L19 0z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M27 0L28 1L27 0z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M28 0L30 2L28 0z" />
                    <path style="fill:#cc203c; stroke:none;" d="M29.6667 0.333334L30.3333 0.666666L29.6667 0.333334z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M31 0L32 1L31 0M2 1L3 2L2 1z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M6 1L7 2L6 1M25 1L24 3L25 1z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M26 1L26 4L27 4L26 1z" />
                    <path style="fill:#cc203c; stroke:none;" d="M26 3L29 1L26 3z" />
                    <path style="fill:#f8f5f7; stroke:none;" d="M21 6L21 7L32 2L21 6z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M0 2L1 3L0 2z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M1 2L2 3L1 2M4 2L5 3L4 2z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M7 2L8 3L7 2M31 2L32 3L31 2z" />
                    <path style="fill:#143274; stroke:none;" d="M0 3C0.654411 6.05392 2.00659 5.93576 5 6L0 3z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M2 3L3 4L2 3z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M3 3L4 4L3 3z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M9 3L10 4L9 3M22 3L23 4L22 3z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M23 3L25 5L23 3z" />
                    <path style="fill:#cc203c; stroke:none;" d="M24.6667 3.33333L25.3333 3.66667L24.6667 3.33333z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M29 3L30 4L29 3z" />
                    <path style="fill:#143274; stroke:none;"
                        d="M27 5L27 6C29.9934 5.93576 31.3456 6.05392 32 3L27 5z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M4 4L5 5L4 4M7 4L8 5L7 4z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M11 4L12 5L11 4M20 4L21 5L20 4z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M21 4L18 8L32 8L32 7L21 7L21 4z" />
                    <path style="fill:#cc203c; stroke:none;" d="M21 6L24 4L21 6z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M0 6L0 7L7 7L0 6z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M6 5L7 6L6 5M9 5L0 7L0 8L14 8L14 7L9 5z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M25 6L25 7L32 7L25 6z" />
                    <path style="fill:#f8f5f7; stroke:none;" d="M7.66667 6.33333L8.33333 6.66667L7.66667 6.33333z" />
                    <path style="fill:#e8a6b1; stroke:none;"
                        d="M0 11L0 12L13 14L14 11L0 11M18 11L18 12L22 14L32 12L18 11z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M0 12L0 13L7 13L0 12z" />
                    <path style="fill:#f8f5f7; stroke:none;"
                        d="M0 17L0 18L11 13L0 17M13 12L13 19L14 19L13 12M18 12L18 19L19 19L19 14L31 19L18 12M23.6667 12.3333L24.3333 12.6667L23.6667 12.3333z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M25 12L25 13L32 13L25 12z" />
                    <path style="fill:#143274; stroke:none;" d="M0 16L5 14C2.3872 12.502 0.645515 12.9876 0 16z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M9 13L11 15L9 13z" />
                    <path style="fill:#cc203c; stroke:none;"
                        d="M10.6667 13.3333L11.3333 13.6667L10.6667 13.3333M23 13L23 14L32 19L23 13z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M25 13L26 14L25 13z" />
                    <path style="fill:#143274; stroke:none;"
                        d="M27 13L27 14L32 16C31.3456 12.9461 29.9934 13.0642 27 13z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M7 14L9 16L7 14z" />
                    <path style="fill:#cc203c; stroke:none;" d="M8.66667 14.3333L9.33333 14.6667L8.66667 14.3333z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M11 14L12 15L11 14z" />
                    <path style="fill:#143274; stroke:none;"
                        d="M12 14L5 18L5 19L13 19L12 14M19 14L19 19L27 19L27 18L19 14z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M20 14L21 15L20 14z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M24 14L25 15L24 14M27 14L28 15L27 14z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M2 15L3 16L2 15z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M5 15L4 16L4 17L5 18L6 18L7 17L7 16L5 15z" />
                    <path style="fill:#cc203c; stroke:none;" d="M6.66667 15.3333L7.33333 15.6667L6.66667 15.3333z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M9 15L10 16L9 15M22 15L23 16L22 15z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M28 15L29 16L28 15z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M29 15L30 16L29 15M0 16L1 17L0 16z" />
                    <path style="fill:#cc203c; stroke:none;" d="M5 16L6 17L5 16z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M7 16L8 17L7 16M24 16L25 17L24 16z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M27 16L28 17L27 16M30 16L31 17L30 16z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M31 16L32 17L31 16z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M2 17L4 19L2 17z" />
                    <path style="fill:#cc203c; stroke:none;" d="M3.66667 17.3333L4.33333 17.6667L3.66667 17.3333z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M6 17L7 18L6 17M25 17L26 18L25 17z" />
                    <path style="fill:#e8a6b1; stroke:none;" d="M29 17L30 18L29 17M0 18L1 19L0 18z" />
                    <path style="fill:#cc203c; stroke:none;" d="M1.66667 18.3333L2.33333 18.6667L1.66667 18.3333z" />
                    <path style="fill:#a5afc8; stroke:none;" d="M4 18L5 19L4 18M27 18L28 19L27 18z" />
                </svg>
                EN
            </div>
            <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div v-show="dialog"
            class="z-10 show absolute bg-white divide-y divide-gray-100 rounded-b-lg shadow-sm w-[6.79rem] dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                <li>
                    <button @click="changeLanguage('pl')" class="inline-flex w-full px-4 py-2 text-sm text-gray-400 hover:bg-gray-600">
                        <div class="inline-flex items-center gap-2 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20">
                                <path style="fill:#ffffff; stroke:none;" d="M0 0L0 10L32 10L32 0L0 0z" />
                                <path style="fill:#dd153d; stroke:none;" d="M0 10L0 20L32 20L32 10L0 10z" />
                            </svg>
                            PL
                        </div>
                    </button>
                </li>
                <li>
                    <button @click="changeLanguage('en')"
                        class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <div class="inline-flex items-center gap-2 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20">
                                <path style="fill:#cc203c; stroke:none;" d="M0 0L9 6L9 5L0 0z" />
                                <path style="fill:#f8f5f7; stroke:none;" d="M1 0L1 1L14 7L14 0L13 0L13 5L1 0z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M4 0L5 1L4 0z" />
                                <path style="fill:#143274; stroke:none;" d="M5 0L5 1L13 5L13 0L5 0z" />
                                <path style="fill:#cc203c; stroke:none;"
                                    d="M14 0L14 8L0 8L0 11L14 11L14 19L18 19L18 11L32 11L32 8L18 8L18 0L14 0z" />
                                <path style="fill:#f8f5f7; stroke:none;" d="M18 0L18 7L19 7L18 0z" />
                                <path style="fill:#143274; stroke:none;" d="M19 0L19 5L27 1L19 0z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M27 0L28 1L27 0z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M28 0L30 2L28 0z" />
                                <path style="fill:#cc203c; stroke:none;"
                                    d="M29.6667 0.333334L30.3333 0.666666L29.6667 0.333334z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M31 0L32 1L31 0M2 1L3 2L2 1z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M6 1L7 2L6 1M25 1L24 3L25 1z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M26 1L26 4L27 4L26 1z" />
                                <path style="fill:#cc203c; stroke:none;" d="M26 3L29 1L26 3z" />
                                <path style="fill:#f8f5f7; stroke:none;" d="M21 6L21 7L32 2L21 6z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M0 2L1 3L0 2z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M1 2L2 3L1 2M4 2L5 3L4 2z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M7 2L8 3L7 2M31 2L32 3L31 2z" />
                                <path style="fill:#143274; stroke:none;"
                                    d="M0 3C0.654411 6.05392 2.00659 5.93576 5 6L0 3z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M2 3L3 4L2 3z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M3 3L4 4L3 3z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M9 3L10 4L9 3M22 3L23 4L22 3z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M23 3L25 5L23 3z" />
                                <path style="fill:#cc203c; stroke:none;"
                                    d="M24.6667 3.33333L25.3333 3.66667L24.6667 3.33333z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M29 3L30 4L29 3z" />
                                <path style="fill:#143274; stroke:none;"
                                    d="M27 5L27 6C29.9934 5.93576 31.3456 6.05392 32 3L27 5z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M4 4L5 5L4 4M7 4L8 5L7 4z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M11 4L12 5L11 4M20 4L21 5L20 4z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M21 4L18 8L32 8L32 7L21 7L21 4z" />
                                <path style="fill:#cc203c; stroke:none;" d="M21 6L24 4L21 6z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M0 6L0 7L7 7L0 6z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M6 5L7 6L6 5M9 5L0 7L0 8L14 8L14 7L9 5z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M25 6L25 7L32 7L25 6z" />
                                <path style="fill:#f8f5f7; stroke:none;"
                                    d="M7.66667 6.33333L8.33333 6.66667L7.66667 6.33333z" />
                                <path style="fill:#e8a6b1; stroke:none;"
                                    d="M0 11L0 12L13 14L14 11L0 11M18 11L18 12L22 14L32 12L18 11z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M0 12L0 13L7 13L0 12z" />
                                <path style="fill:#f8f5f7; stroke:none;"
                                    d="M0 17L0 18L11 13L0 17M13 12L13 19L14 19L13 12M18 12L18 19L19 19L19 14L31 19L18 12M23.6667 12.3333L24.3333 12.6667L23.6667 12.3333z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M25 12L25 13L32 13L25 12z" />
                                <path style="fill:#143274; stroke:none;"
                                    d="M0 16L5 14C2.3872 12.502 0.645515 12.9876 0 16z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M9 13L11 15L9 13z" />
                                <path style="fill:#cc203c; stroke:none;"
                                    d="M10.6667 13.3333L11.3333 13.6667L10.6667 13.3333M23 13L23 14L32 19L23 13z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M25 13L26 14L25 13z" />
                                <path style="fill:#143274; stroke:none;"
                                    d="M27 13L27 14L32 16C31.3456 12.9461 29.9934 13.0642 27 13z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M7 14L9 16L7 14z" />
                                <path style="fill:#cc203c; stroke:none;"
                                    d="M8.66667 14.3333L9.33333 14.6667L8.66667 14.3333z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M11 14L12 15L11 14z" />
                                <path style="fill:#143274; stroke:none;"
                                    d="M12 14L5 18L5 19L13 19L12 14M19 14L19 19L27 19L27 18L19 14z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M20 14L21 15L20 14z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M24 14L25 15L24 14M27 14L28 15L27 14z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M2 15L3 16L2 15z" />
                                <path style="fill:#e8a6b1; stroke:none;"
                                    d="M5 15L4 16L4 17L5 18L6 18L7 17L7 16L5 15z" />
                                <path style="fill:#cc203c; stroke:none;"
                                    d="M6.66667 15.3333L7.33333 15.6667L6.66667 15.3333z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M9 15L10 16L9 15M22 15L23 16L22 15z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M28 15L29 16L28 15z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M29 15L30 16L29 15M0 16L1 17L0 16z" />
                                <path style="fill:#cc203c; stroke:none;" d="M5 16L6 17L5 16z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M7 16L8 17L7 16M24 16L25 17L24 16z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M27 16L28 17L27 16M30 16L31 17L30 16z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M31 16L32 17L31 16z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M2 17L4 19L2 17z" />
                                <path style="fill:#cc203c; stroke:none;"
                                    d="M3.66667 17.3333L4.33333 17.6667L3.66667 17.3333z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M6 17L7 18L6 17M25 17L26 18L25 17z" />
                                <path style="fill:#e8a6b1; stroke:none;" d="M29 17L30 18L29 17M0 18L1 19L0 18z" />
                                <path style="fill:#cc203c; stroke:none;"
                                    d="M1.66667 18.3333L2.33333 18.6667L1.66667 18.3333z" />
                                <path style="fill:#a5afc8; stroke:none;" d="M4 18L5 19L4 18M27 18L28 19L27 18z" />
                            </svg>
                            EN
                        </div>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import { Inertia } from "@inertiajs/inertia";
export default {
    name: "Localization",
    props: [],
    components: {
    },
    data() {
        return {
            dialog: false,
            currentchanged: null,
        }
    },
    methods: {
        showdialog() {
            this.dialog = !this.dialog;
        },
        mouseleave() {
            this.dialog = false;
        },
        changeLanguage(string){
            this.dialog = false;
            this.currentchanged = string;
            axios.post('/change-locale', {language:string}).then(
                (response) => {window.location.reload();}
            );
            Inertia.reload();
        }
    }
}
</script>