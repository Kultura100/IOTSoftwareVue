<template>
    <div class="h-10 w-10 mx-auto">
        <JetResponsiveNavLink  :href="route('dashboard')">
            <img class="max-w-full h-auto" width="100" height="100" src="/storage/images/logo.png" alt="Logo">
        </JetResponsiveNavLink>
    </div>
</template>


<script>
import JetResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
export default {
name: "Logo",
components: {
    JetResponsiveNavLink,
}
};

</script>