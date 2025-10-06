<template>
    <div class="space-y-6">
        <!-- Search Widget -->
        <div class="card p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">
                {{ $t('sidebar.search') }}
            </h3>
            <form @submit.prevent="searchBlogs" class="space-y-4">
                <div>
                    <input
                        v-model="searchQuery"
                        type="text"
                        :placeholder="$t('sidebar.search_placeholder')"
                        class="form-input"
                    />
                </div>
                <button type="submit" class="btn-primary w-full">
                    {{ $t('sidebar.search_button') }}
                </button>
            </form>
        </div>

        <!-- Categories Widget -->
        <div v-if="categories.length > 0" class="card p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">
                {{ $t('sidebar.categories') }}
            </h3>
            <ul class="space-y-2">
                <li v-for="category in categories" :key="category.id">
                    <Link 
                        :href="route('guest.blog.index', { category: category.id })"
                        class="text-gray-600 hover:text-primary-600 transition-colors flex items-center justify-between"
                    >
                        <span>{{ getCategoryName(category) }}</span>
                        <span class="text-sm text-gray-400">({{ category.blogs_count || 0 }})</span>
                    </Link>
                </li>
            </ul>
        </div>

        <!-- States Widget -->
        <div v-if="states.length > 0" class="card p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">
                {{ $t('sidebar.states') }}
            </h3>
            <ul class="space-y-2">
                <li v-for="state in states" :key="state.id">
                    <Link 
                        :href="route('guest.blog.index', { state: state.id })"
                        class="text-gray-600 hover:text-primary-600 transition-colors flex items-center justify-between"
                    >
                        <span>{{ state.name }}</span>
                        <span class="text-sm text-gray-400">({{ state.blogs_count || 0 }})</span>
                    </Link>
                </li>
            </ul>
        </div>

        <!-- Recent Posts Widget -->
        <div v-if="recentPosts.length > 0" class="card p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">
                {{ $t('sidebar.recent_posts') }}
            </h3>
            <ul class="space-y-4">
                <li v-for="post in recentPosts" :key="post.id" class="flex space-x-3">
                    <div v-if="getPostImage(post)" class="flex-shrink-0">
                        <img 
                            :src="getPostImage(post)" 
                            :alt="getPostTitle(post)"
                            class="w-16 h-16 object-cover rounded-md"
                        />
                    </div>
                    <div class="flex-1 min-w-0">
                        <Link 
                            :href="route('guest.blog.show', post.slug)"
                            class="text-sm font-medium text-gray-900 hover:text-primary-600 line-clamp-2"
                        >
                            {{ getPostTitle(post) }}
                        </Link>
                        <p class="text-xs text-gray-500 mt-1">
                            {{ formatDate(post.created_at) }}
                        </p>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Contact Widget -->
        <div class="card p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">
                {{ $t('sidebar.contact') }}
            </h3>
            <p class="text-gray-600 text-sm mb-4">
                {{ $t('sidebar.contact_description') }}
            </p>
            <Link 
                :href="route('contact.create')"
                class="btn-primary w-full"
            >
                {{ $t('sidebar.contact_button') }}
            </Link>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { Link, router } from '@inertiajs/vue3'

// Props
const props = defineProps({
    categories: {
        type: Array,
        default: () => []
    },
    states: {
        type: Array,
        default: () => []
    },
    recentPosts: {
        type: Array,
        default: () => []
    },
    locale: String
})

// State
const searchQuery = ref('')

// Methods
const getCategoryName = (category) => {
    return props.locale === 'fa' ? category.name_fa : category.name_en
}

const getPostTitle = (post) => {
    return props.locale === 'fa' ? post.title_fa : post.title_en
}

const getPostImage = (post) => {
    const content = props.locale === 'fa' ? post.body_fa : post.body_en
    if (!content) return null
    
    const imgMatch = content.match(/<img[^>]+src="([^"]+)"/i)
    return imgMatch ? imgMatch[1] : null
}

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString(props.locale === 'fa' ? 'fa-IR' : 'en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    })
}

const searchBlogs = () => {
    if (searchQuery.value.trim()) {
        router.get(route('guest.blog.index'), { search: searchQuery.value })
    }
}
</script>
