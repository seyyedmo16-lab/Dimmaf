<template>
    <AppLayout title="Blog">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('blog.title') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Breadcrumbs -->
                <nav class="flex mb-8" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <Link :href="route('home')" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600">
                                <HomeIcon class="w-4 h-4 mr-2" />
                                {{ $t('common.home') }}
                            </Link>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <ChevronRightIcon class="w-4 h-4 text-gray-400" />
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                                    {{ $t('blog.provinces') }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- State Title -->
                <div v-if="state" class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">{{ state.name }}</h1>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                    <!-- Blog Entries -->
                    <div class="lg:col-span-3">
                        <div class="space-y-8">
                            <article 
                                v-for="blog in blogs.data" 
                                :key="blog.id"
                                class="card hover:shadow-lg transition-shadow duration-300"
                            >
                                <!-- Blog Image -->
                                <div v-if="getBlogImage(blog)" class="aspect-video overflow-hidden">
                                    <img 
                                        :src="getBlogImage(blog)" 
                                        :alt="getBlogTitle(blog)"
                                        class="w-full h-full object-cover"
                                    />
                                </div>

                                <div class="p-6">
                                    <!-- Blog Title -->
                                    <h2 class="text-xl font-semibold text-gray-900 mb-3">
                                        <Link 
                                            :href="route('guest.blog.show', blog.slug)"
                                            class="hover:text-primary-600 transition-colors"
                                        >
                                            {{ getBlogTitle(blog) }}
                                        </Link>
                                    </h2>

                                    <!-- Blog Content Preview -->
                                    <div class="prose prose-sm max-w-none text-gray-600 mb-4">
                                        <p>{{ getBlogExcerpt(blog) }}</p>
                                    </div>

                                    <!-- Read More Link -->
                                    <div class="flex justify-end">
                                        <Link 
                                            :href="route('guest.blog.show', blog.slug)"
                                            class="btn-primary"
                                        >
                                            {{ $t('blog.read_more') }}
                                        </Link>
                                    </div>
                                </div>
                            </article>

                            <!-- Empty State -->
                            <div v-if="blogs.data.length === 0" class="text-center py-12">
                                <DocumentTextIcon class="mx-auto h-12 w-12 text-gray-400" />
                                <h3 class="mt-2 text-sm font-medium text-gray-900">{{ $t('blog.no_posts') }}</h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $t('blog.no_posts_description') }}</p>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div v-if="blogs.links" class="mt-8">
                            <Pagination :links="blogs.links" />
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1">
                        <Sidebar />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import Sidebar from '@/Components/Sidebar.vue'
import Pagination from '@/Components/Pagination.vue'
import { 
    HomeIcon, 
    ChevronRightIcon, 
    DocumentTextIcon 
} from '@heroicons/vue/24/outline'

// Props
const props = defineProps({
    blogs: Object,
    state: Object,
    locale: String
})

// Computed properties for localization
const getBlogTitle = (blog) => {
    return props.locale === 'fa' ? blog.title_fa : blog.title_en
}

const getBlogExcerpt = (blog) => {
    const content = props.locale === 'fa' ? blog.body_fa : blog.body_en
    if (!content) return ''
    
    // Strip HTML tags and get first 400 characters
    const textContent = content.replace(/<[^>]*>/g, '')
    return textContent.length > 400 ? textContent.substring(0, 400) + '...' : textContent
}

const getBlogImage = (blog) => {
    const content = props.locale === 'fa' ? blog.body_fa : blog.body_en
    if (!content) return null
    
    // Extract first image from HTML content
    const imgMatch = content.match(/<img[^>]+src="([^"]+)"/i)
    return imgMatch ? imgMatch[1] : null
}
</script>
