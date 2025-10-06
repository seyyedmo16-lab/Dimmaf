<template>
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <Link :href="route('home')" class="text-xl font-bold text-primary-600">
                                {{ $page.props.appName || 'Laravel' }}
                            </Link>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <Link 
                                :href="route('home')"
                                class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm transition-colors"
                                :class="{ 'border-primary-500 text-primary-600': $page.url === '/' }"
                            >
                                {{ $t('nav.home') }}
                            </Link>
                            <Link 
                                :href="route('guest.blog.index')"
                                class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm transition-colors"
                                :class="{ 'border-primary-500 text-primary-600': $page.url.startsWith('/blog') }"
                            >
                                {{ $t('nav.blog') }}
                            </Link>
                            <Link 
                                :href="route('aboutus')"
                                class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm transition-colors"
                                :class="{ 'border-primary-500 text-primary-600': $page.url === '/aboutus' }"
                            >
                                {{ $t('nav.about') }}
                            </Link>
                        </div>
                    </div>

                    <!-- Right side -->
                    <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                        <!-- Language Switcher -->
                        <div class="relative">
                            <select 
                                v-model="selectedLanguage"
                                @change="changeLanguage"
                                class="form-input text-sm py-1 px-2 border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                            >
                                <option value="en">English</option>
                                <option value="fa">فارسی</option>
                            </select>
                        </div>

                        <!-- User Menu -->
                        <div v-if="$page.props.auth.user" class="relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                                        <div>{{ $page.props.auth.user.name }}</div>
                                        <ChevronDownIcon class="ml-2 -mr-0.5 h-4 w-4" />
                                    </button>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('admin.dashboard')" v-if="$page.props.auth.user.role === 'admin'">
                                        {{ $t('nav.dashboard') }}
                                    </DropdownLink>
                                    <DropdownLink :href="route('admin.profile.edit')">
                                        {{ $t('nav.profile') }}
                                    </DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        {{ $t('nav.logout') }}
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>

                        <!-- Guest Menu -->
                        <div v-else class="flex items-center space-x-4">
                            <Link 
                                :href="route('login')"
                                class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium transition-colors"
                            >
                                {{ $t('nav.login') }}
                            </Link>
                            <Link 
                                :href="route('register')"
                                class="btn-primary"
                            >
                                {{ $t('nav.register') }}
                            </Link>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button 
                            @click="mobileMenuOpen = !mobileMenuOpen"
                            class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500"
                        >
                            <Bars3Icon v-if="!mobileMenuOpen" class="block h-6 w-6" />
                            <XMarkIcon v-else class="block h-6 w-6" />
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div v-show="mobileMenuOpen" class="sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <Link 
                        :href="route('home')"
                        class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors"
                        :class="{ 'border-primary-500 text-primary-600': $page.url === '/' }"
                    >
                        {{ $t('nav.home') }}
                    </Link>
                    <Link 
                        :href="route('guest.blog.index')"
                        class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors"
                        :class="{ 'border-primary-500 text-primary-600': $page.url.startsWith('/blog') }"
                    >
                        {{ $t('nav.blog') }}
                    </Link>
                    <Link 
                        :href="route('aboutus')"
                        class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition-colors"
                        :class="{ 'border-primary-500 text-primary-600': $page.url === '/aboutus' }"
                    >
                        {{ $t('nav.about') }}
                    </Link>
                </div>

                <!-- Mobile user menu -->
                <div v-if="$page.props.auth.user" class="pt-4 pb-3 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-primary-500 flex items-center justify-center">
                                <span class="text-white font-medium">
                                    {{ $page.props.auth.user.name.charAt(0).toUpperCase() }}
                                </span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-gray-800">{{ $page.props.auth.user.name }}</div>
                            <div class="text-sm font-medium text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <Link 
                            :href="route('admin.dashboard')"
                            v-if="$page.props.auth.user.role === 'admin'"
                            class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100"
                        >
                            {{ $t('nav.dashboard') }}
                        </Link>
                        <Link 
                            :href="route('admin.profile.edit')"
                            class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100"
                        >
                            {{ $t('nav.profile') }}
                        </Link>
                        <Link 
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100"
                        >
                            {{ $t('nav.logout') }}
                        </Link>
                    </div>
                </div>

                <!-- Mobile guest menu -->
                <div v-else class="pt-4 pb-3 border-t border-gray-200">
                    <div class="space-y-1">
                        <Link 
                            :href="route('login')"
                            class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100"
                        >
                            {{ $t('nav.login') }}
                        </Link>
                        <Link 
                            :href="route('register')"
                            class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100"
                        >
                            {{ $t('nav.register') }}
                        </Link>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 mt-12">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="col-span-1 md:col-span-2">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            {{ $page.props.appName || 'Laravel' }}
                        </h3>
                        <p class="text-gray-600">
                            {{ $t('footer.description') }}
                        </p>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">
                            {{ $t('footer.links') }}
                        </h4>
                        <ul class="space-y-2">
                            <li>
                                <Link :href="route('home')" class="text-gray-600 hover:text-primary-600">
                                    {{ $t('nav.home') }}
                                </Link>
                            </li>
                            <li>
                                <Link :href="route('guest.blog.index')" class="text-gray-600 hover:text-primary-600">
                                    {{ $t('nav.blog') }}
                                </Link>
                            </li>
                            <li>
                                <Link :href="route('aboutus')" class="text-gray-600 hover:text-primary-600">
                                    {{ $t('nav.about') }}
                                </Link>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">
                            {{ $t('footer.contact') }}
                        </h4>
                        <p class="text-gray-600 text-sm">
                            {{ $t('footer.contact_info') }}
                        </p>
                    </div>
                </div>
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <p class="text-center text-gray-500 text-sm">
                        &copy; {{ new Date().getFullYear() }} {{ $page.props.appName || 'Laravel' }}. {{ $t('footer.rights') }}.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'
import { 
    Bars3Icon, 
    XMarkIcon, 
    ChevronDownIcon 
} from '@heroicons/vue/24/outline'

// Props
defineProps({
    title: String
})

// State
const mobileMenuOpen = ref(false)
const selectedLanguage = ref('en')

// Methods
const changeLanguage = () => {
    router.get(route('language.switch', selectedLanguage.value))
}

// Initialize language from cookie
onMounted(() => {
    const lang = document.cookie
        .split('; ')
        .find(row => row.startsWith('language='))
        ?.split('=')[1]
    
    if (lang) {
        selectedLanguage.value = lang
    }
})
</script>
