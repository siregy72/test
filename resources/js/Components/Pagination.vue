<script setup>
import { router } from '@inertiajs/vue3';
defineProps({
    data: {
        type: Object,
        required: true,
    },
});

const updatePageNumber = (link) => {
    let pageNumber = link.url.split('=')[1];

    router.visit('?page=' + pageNumber, {
        preserveScroll: true,
    });
};
</script>

<template>
    <!-- 페이징 디자인을 Tailwind로 이쁘게 개선 -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 py-4">
        <div class="text-sm text-gray-700">
            <span class="font-semibold">{{ data.meta.from }}</span>
            <span>에서</span>
            <span class="font-semibold">{{ data.meta.to }}</span>
            <span>까지</span>
            <span class="font-semibold">{{ data.meta.total }}</span>
            <span>개의 학생</span>
        </div>
        <nav class="inline-flex shadow-sm rounded-md" aria-label="Pagination">
            <button
                v-for="link in data.meta.links"
                @click.prevent="updatePageNumber(link)"
                :disabled="link.active || !link.url"
                class="relative inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium transition
                    "
                :class="link.label == data.meta.current_page
                    ? 'z-10 bg-blue-500 text-white border-blue-500'
                    : 'bg-white text-gray-700 hover:bg-gray-100'"
            >
                {{ link.label.replace('pagination.', '') }}
            </button>
        </nav>
    </div>
</template>
