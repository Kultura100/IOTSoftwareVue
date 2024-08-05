<template>
	<aside class="hidden lg:flex flex-col items-center text-white shadow h-full bg-[#222831]">
		<div class="h-16 flex items-center w-full">
			<ApplicationLogo />
		</div>
		<ul v-if="$page.props.Uzytkownik">
			<li class="buttonstyle">
				<JetResponsiveNavLink aria-label="devices" :customclass="'h-16 px-6 flex justify-center items-center w-full focus:text-orange-500'" :href="route('devices')">
					<i class=" fa-solid fa-mobile-screen fa-lg"></i>
				</JetResponsiveNavLink>
			</li>
			<li class="buttonstyle">
				<!-- <a :href="route('dashboard')" class="h-16 px-6 flex justify-center items-center w-full focus:text-orange-500 ">
				</a> -->
				<JetResponsiveNavLink aria-label="raports" :customclass="'h-16 px-6 flex justify-center items-center w-full focus:text-orange-500'" :href="route('raports')">
					<i class="fa-solid fa-chart-line fa-lg"></i>
				</JetResponsiveNavLink>
			</li>
			<li class="buttonstyle">
				<!-- <a :href="route('cameras')" class="h-16 px-6 flex justify-center items-center w-full focus:text-orange-500 ">
				</a> -->
				<JetResponsiveNavLink aria-label="cameras" :customclass="'h-16 px-6 flex justify-center items-center w-full focus:text-orange-500'" :href="route('cameras')">
					<i class="fa-solid fa-video fa-lg"></i>
				</JetResponsiveNavLink>
			</li>
			<li class="buttonstyle">
				<!-- <a :href="route('profile.show')"  class="h-16 px-6 flex justify-center items-center w-full focus:text-orange-500 ">
				</a> -->
				<JetResponsiveNavLink aria-label="timetable" :customclass="'h-16 px-6 flex justify-center items-center w-full focus:text-orange-500'" :href="route('timetable')">
					<i class="fa-solid fa-calendar fa-lg"></i>
				</JetResponsiveNavLink>
			</li>
			<li class="buttonstyle">
				<!-- <a :href="route('profile.show')"  class="h-16 px-6 flex justify-center items-center w-full focus:text-orange-500 ">
				</a> -->
				<JetResponsiveNavLink aria-label="settings" :customclass="'h-16 px-6 flex justify-center items-center w-full focus:text-orange-500'" :href="route('profile.show')">
					<i class="fa-solid fa-gear fa-lg"></i>
				</JetResponsiveNavLink>
			</li>
		</ul>
		<ul v-else>
			<li class="buttonstyle">
				<a title="Funkcje niedostępne bez zalogowania" class="h-16 px-6 flex justify-center items-center w-full focus:text-orange-500  fa-solid fa-lock fa-lg">
				</a>
			</li>
		</ul>

		<div v-if="$page.props.Uzytkownik" class="mt-auto w-full">
			<form v-on:submit.prevent="Logout()" class="h-16 flex items-center w-full">
				<button aria-label="wylogowanie" type="submit" v-on:click="Logout()" class="h-16 mx-auto flex justify-center items-center
				w-full focus:text-orange-500 hover:bg-red-200 focus:outline-none">
					<i class="fa-solid fa-arrow-right-from-bracket fa-lg text-red-500"></i>
				</button>
			</form>
		</div>

	</aside>
</template>

<script>
import JetResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Inertia } from '@inertiajs/inertia'
import { usePage } from '@inertiajs/inertia-vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
export default {
	name: "leftmenu",
	components: {
		JetResponsiveNavLink,
		ApplicationLogo,
	},
	props: ["title"],
	data() {
		return {
			//user: UserGlobal,
			costam: null,
		};
	},
	methods: {
		CheckRoute(status) {
			console.log(status);
			if (status === 'Camera') {
				return "text-orange-500";
			}
		},
		Logout() {
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
	},
	computed() {
		//this.fetchAuth();
	}
};

</script>