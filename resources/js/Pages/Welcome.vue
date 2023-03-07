<script setup>
import Frontend from '@/Layouts/Frontend.vue';
import { Head, Link } from '@inertiajs/vue3';
import Hero from "@/Components/Frontend/Hero.vue"
import Promote from "@/Components/Frontend/Promote.vue"
import About from "@/Components/Frontend/About.vue"
import Skills from "@/Components/Frontend/Skills.vue"
import Portfolio from "@/Components/Frontend/Portfolio.vue";
import Services from "@/Components/Frontend/Services.vue"
import ContactMe from "@/Components/Frontend/ContactMe.vue";
import { ref, inject } from "vue";
defineProps({
    skills: Object,
    projects: Object,
});
const { state } = inject("store");
</script>

<template >
    <Head title="Welcome to my portfolio" />
    <div :class="{ 'dark': state.darkMode }">
        <Frontend>
            <!-- Hero primary -->
            <Hero />
            <!-- Promote tail-100 -->
            <Promote />
            <!-- About Secondary -->
            <About />
            <!-- Sklll -->
            <Skills :skills="skills" />
            <!-- Portfolio -->
            <Portfolio :skills="skills" :projects="projects" />
            <!-- Service -->
            <Services />
            <!-- Contact primary -->
            <ContactMe />
        </Frontend>
    </div>
</template>


