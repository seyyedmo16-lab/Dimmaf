<template>
    <nav v-if="links.length > 3" class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
            <Link 
                v-if="links[0].url"
                :href="links[0].url"
                class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                {{ $t('pagination.previous') }}
            </Link>
            <Link 
                v-if="links[links.length - 1].url"
                :href="links[links.length - 1].url"
                class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                {{ $t('pagination.next') }}
            </Link>
        </div>
        
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    {{ $t('pagination.showing') }}
                    <span class="font-medium">{{ paginationData.from }}</span>
                    {{ $t('pagination.to') }}
                    <span class="font-medium">{{ paginationData.to }}</span>
                    {{ $t('pagination.of') }}
                    <span class="font-medium">{{ paginationData.total }}</span>
                    {{ $t('pagination.results') }}
                </p>
            </div>
            
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                    <template v-for="(link, index) in links" :key="index">
                        <Link 
                            v-if="link.url"
                            :href="link.url"
                            v-html="link.label"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold transition-colors"
                            :class="[
                                link.active 
                                    ? 'z-10 bg-primary-600 text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600'
                                    : 'text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0'
                            ]"
                        />
                        <span 
                            v-else
                            v-html="link.label"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-500 ring-1 ring-inset ring-gray-300 focus:outline-offset-0"
                        />
                    </template>
                </nav>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

// Props
const props = defineProps({
    links: {
        type: Array,
        required: true
    }
})

// Computed
const paginationData = computed(() => {
    // Extract pagination data from the links
    // This assumes the links follow Laravel's pagination structure
    const firstLink = props.links[0]
    const lastLink = props.links[props.links.length - 1]
    
    // Try to extract from URL parameters or use defaults
    let from = 1
    let to = 10
    let total = 100
    
    // You might need to pass this data as props from the parent component
    // For now, using placeholder values
    return {
        from,
        to,
        total
    }
})
</script>
