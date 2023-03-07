<script setup>
import { ref, onMounted, inject } from "vue";
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
const showMobileMenu = ref("false");
const scrollBg = ref(false);
const activeProfile = ref(false);

const { state } = inject("store");

function handleDarkMode() {
  state.darkMode = !state.darkMode;
}
function handleProfile() {
  activeProfile.value = !activeProfile.value;
}

const navigations = [
  { name: "Home", href: "#home" },
  { name: "About", href: "#about" },
  { name: "Portfolio", href: "#portfolio" },
  { name: "Services", href: "#services" },
  { name: "Contact", href: "#contact" },
];
const setScrollBg = (value) => {
  scrollBg.value = value;
};

onMounted(() => {
  window.addEventListener("scroll", () => {
    return window.scrollY > 50 ? setScrollBg(true) : setScrollBg(false);
  });
});
</script>
<template>
  <nav class="w-full fixed z-20 border-gray-200 px-2 sm:px-4 py-2.5 rounded" :class="{
    'bg-light-primary dark:bg-dark-primary': scrollBg,
    'bg-white dark:bg-slate-800': !scrollBg,

  }">
    <div class="container flex flex-wrap justify-between items-center mx-auto" bis_skin_checked="1">
      <a href="#" class="flex items-center ">
        <img src="/assets/images/person/11.webp" class="mr-3 h-6 sm:h-9 rounded-full" alt="Laraveller Logo" />
        <span class="
                            self-center
                            text-xl
                            font-semibold
                            whitespace-nowrap
                            dark:text-white
                          ">Lulu</span>
      </a>
      <button @click="showMobileMenu = !showMobileMenu" data-collapse-toggle="navbar-default" type="button" class="
                          inline-flex
                          items-center
                          p-2
                          ml-3
                          text-sm text-gray-500
                          rounded-lg
                          md:hidden
                          hover:bg-gray-100
                          focus:outline-none focus:ring-2 focus:ring-gray-200
                          dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600
                        " aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"></path>
        </svg>
      </button>
      <div class="w-full md:block md:w-auto" :class="{ hidden: showMobileMenu }" id="navbar-default" bis_skin_checked="1">
        <ul class="
                            flex flex-col
                            p-4
                            mt-4
                            rounded-lg
                            border border-light-tail-500
                            dark:border-dark-navy-100
                            md:flex-row md:space-x-8 md:mt-0 md:font-medium md:border-0
                          ">
          <li v-for="(navigation, index) in navigations" :key="index">
            <a :href="navigation.href" class="
                                block
                                py-2
                                pr-4
                                pl-3
                              text-light-tail-500
                              rounded
                              dark:text-dark-navy-100
                              hover:text-light-tail-100
                              dark:hover:text-white
                            " aria-current="page">
            {{ navigation.name }}
          </a>
        </li>
        <!-- Rounded switch -->
        <label class="switch">
          <input type="checkbox" @click="handleDarkMode">
            <span class=" round" :class="state.darkMode ? 'slider bg-[#2196F3]' : 'slider'"></span>
          </label>
          <!-- ### Profile ### -->

          <!-- Dropdown menu -->

          <Dropdown align="right" width="48">
            <template #trigger>
              <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                class="flex items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white"
                type="button">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 mr-2 rounded-full" src="/assets/images/person/11.webp" alt="user photo">
                <!-- {{ $page.props.auth.user.name }} -->
                heng
                <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
                </svg>
              </button>
            </template>

            <template #content>
              <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
              <DropdownLink :href="route('logout')" method="post" as="button">
                Log Out
              </DropdownLink>
            </template>
          </Dropdown>

          <!-- ### Profile ### -->
        </ul>
      </div>
    </div>
  </nav>
</template>

<style scoped>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked+.slider {
  background-color: #2196F3;
}

input:focus+.slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}</style>