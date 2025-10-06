<template>
    <AppLayout :title="blog.title_en || blog.title_fa">
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ getBlogTitle(blog) }}
                </h2>
                <Link 
                    :href="route('guest.blog.index')"
                    class="btn-outline"
                >
                    {{ $t('common.back') }}
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
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
                                <Link :href="route('guest.blog.index')" class="ml-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ml-2">
                                    {{ $t('blog.provinces') }}
                                </Link>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <ChevronRightIcon class="w-4 h-4 text-gray-400" />
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">
                                    {{ getBlogTitle(blog) }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Blog Content -->
                <article class="card">
                    <!-- Blog Header -->
                    <div class="p-6 border-b border-gray-200">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">
                            {{ getBlogTitle(blog) }}
                        </h1>
                        
                        <!-- Blog Meta -->
                        <div class="flex items-center text-sm text-gray-500 space-x-4">
                            <div class="flex items-center">
                                <CalendarIcon class="w-4 h-4 mr-1" />
                                {{ formatDate(blog.created_at) }}
                            </div>
                            <div v-if="blog.state" class="flex items-center">
                                <MapPinIcon class="w-4 h-4 mr-1" />
                                {{ blog.state.name }}
                            </div>
                        </div>
                    </div>

                    <!-- Blog Body -->
                    <div class="p-6">
                        <div 
                            class="prose prose-lg max-w-none"
                            v-html="getBlogContent(blog)"
                        ></div>
                    </div>

                    <!-- Blog Footer -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <Link 
                                    :href="route('guest.blog.index')"
                                    class="btn-outline"
                                >
                                    {{ $t('blog.back_to_list') }}
                                </Link>
                            </div>
                            
                            <!-- Share Buttons -->
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-gray-500">{{ $t('blog.share') }}:</span>
                                <button 
                                    @click="shareOnTwitter"
                                    class="p-2 text-gray-400 hover:text-blue-500 transition-colors"
                                    :title="$t('blog.share_twitter')"
                                >
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </button>
                                <button 
                                    @click="shareOnFacebook"
                                    class="p-2 text-gray-400 hover:text-blue-600 transition-colors"
                                    :title="$t('blog.share_facebook')"
                                >
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import { 
    HomeIcon, 
    ChevronRightIcon,
    CalendarIcon,
    MapPinIcon
} from '@heroicons/vue/24/outline'

// Props
const props = defineProps({
    blog: Object,
    locale: String
})

// Methods
const getBlogTitle = (blog) => {
    return props.locale === 'fa' ? blog.title_fa : blog.title_en
}

const getBlogContent = (blog) => {
    return props.locale === 'fa' ? blog.body_fa : blog.body_en
}

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString(props.locale === 'fa' ? 'fa-IR' : 'en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    })
}

const shareOnTwitter = () => {
    const url = encodeURIComponent(window.location.href)
    const text = encodeURIComponent(getBlogTitle(props.blog))
    window.open(`https://twitter.com/intent/tweet?text=${text}&url=${url}`, '_blank')
}

const shareOnFacebook = () => {
    const url = encodeURIComponent(window.location.href)
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank')
}
</script>
