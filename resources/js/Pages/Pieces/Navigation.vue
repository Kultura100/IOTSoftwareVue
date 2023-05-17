<!-- <script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Components/ApplicationMark.vue';
import JetBanner from '@/Components/Banner.vue';
import JetDropdown from '@/Components/Dropdown.vue';
import JetDropdownLink from '@/Components/DropdownLink.vue';
import JetNavLink from '@/Components/NavLink.vue';
import JetResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Button from '@/Components/Button.vue';
import CustomLink from '@/Components/CustomLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    Inertia.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    Inertia.post(route('logout'));
};
</script> -->

<script>
import JetResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Inertia } from '@inertiajs/inertia'
import axios from 'axios';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import LocalizationChanger from '../LocalizationChanger.vue';
export default {
name: "leftmenu",
components: {
    JetResponsiveNavLink,
    ApplicationLogo,
    LocalizationChanger
},
props: ["title","appName"],
data() {
    return {
        //user: UserGlobal,
        costam: this.appName
    };
},
methods: {
    Logout(){
		Inertia.post(route('logout'));
	},
    fetchAuth() {
    axios.get('/get-auth')
        .then((response) => {
            this.user = response.data.auth
        })
        .catch((error) => {
            // handle error
        });
    },
    ProfileJump(){
        Inertia.get(route('profile.show'));
}
},
mounted() {
    //this.fetchAuth();
}
};
</script>

<template>


		<nav class="px-4 flex justify-between bg-white h-16 border-b-2 navigation">
			
            <ul class="flex items-center lg:hidden">
				<ApplicationLogo />
			</ul>
			<ul class="flex items-center">
				<li>
					<h1 class="pl-10 lg:pl-0 text-white">{{title}}</h1>
				</li>
			</ul>
			<ul v-if="$page.props.Uzytkownik" class="flex items-center">
				<!-- to bar right  -->
                <li>
                    <LocalizationChanger></LocalizationChanger>
                </li>
            <li>
                <JetResponsiveNavLink aria-label="report" :customclass="'h-16 px-6 flex justify-center items-center w-full focus:text-orange-500'" :href="route('reportbug')">
				<i class="fa-solid fa-bug fa-lg"></i>
				</JetResponsiveNavLink>
			</li>

				<li class="h-8 w-8 cursor-pointer" @click="ProfileJump">
                        <img alt="logo" v-if="$page.props.Uzytkownik" :src="$page.props.Uzytkownik.profile_photo_url" class="h-full w-full rounded-full mx-auto"/>
                        <img alt="avatarprofile" v-else src="/storage/profile-photos/avatarprofile.png" class="h-full w-full rounded-full mx-auto"/>
				</li>

			</ul>
		</nav>

        <nav v-if="$page.props.Uzytkownik"
		class="fixed bottom-0 w-full bg-white z-20 lg:hidden flex overflow-x-auto navigation h-16">
		<!-- Bottom Icon Navigation Menu -->
		<a :href="route('devices')" class="flex flex-col flex-grow items-center justify-center overflow-hidden whitespace-no-wrap transition-colors duration-100 ease-in-out focus:text-orange-500 buttonstyle fa-solid fa-mobile-screen fa-xl">
		</a>

        <a :href="route('raports')" class="flex flex-col flex-grow items-center justify-center overflow-hidden whitespace-no-wrap transition-colors duration-100 ease-in-out focus:text-orange-500 buttonstyle fa-solid fa-chart-line fa-lg">
		</a>

        <a :href="route('cameras')" class="flex flex-col flex-grow items-center justify-center overflow-hidden whitespace-no-wrap transition-colors duration-100 ease-in-out focus:text-orange-500 buttonstyle fa-solid fa-video fa-lg">
		</a>

        <a :href="route('timetable')" class="flex flex-col flex-grow items-center justify-center overflow-hidden whitespace-no-wrap transition-colors duration-100 ease-in-out focus:text-orange-500 buttonstyle fa-solid fa-calendar fa-lg">
		</a>

        <a :href="route('profile.show')" class="flex flex-col flex-grow items-center justify-center overflow-hidden whitespace-no-wrap transition-colors duration-100 ease-in-out focus:text-orange-500 buttonstyle fa-solid fa-gear fa-lg">
		</a>
			<button v-on:click="Logout()"
				class="flex flex-col flex-grow items-center justify-center overflow-hidden whitespace-no-wrap transition-colors duration-100 ease-in-out hover:bg-red-200 focus:outline-none focus:text-orange-500">
				<i class="fa-solid fa-arrow-right-from-bracket fa-lg text-red-500"></i>
			</button>
	    </nav>
        <nav v-else class="fixed bottom-0 w-full bg-white lg:hidden flex overflow-x-auto navigation h-16">
        <a title="Funkcje niedostępne bez zalogowania" class="flex flex-col flex-grow items-center justify-center overflow-hidden whitespace-no-wrap transition-colors duration-100 ease-in-out focus:text-orange-500 buttonstyle fa-solid fa-lock fa-lg">
		</a>
        </nav>
</template>