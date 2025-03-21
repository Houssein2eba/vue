<template>
    <Head title="Index" />
    <h1 class="text-xl font-bold mb-4">Posts List</h1>

    <!-- Search Input -->
    <div class="mb-4">
        <input
            type="search"
            class="border p-2 rounded w-full"
            placeholder="Search posts..."
            @input="search($event.target.value)"
        />
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 border-b">ID</th>
                    <th class="py-3 px-6 border-b">Title</th>
                    <th class="py-3 px-6 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in searchedPosts" :key="post.id" class="border-b hover:bg-gray-50">
                    <td class="py-3 px-6">{{ post.id }}</td>
                    <td class="py-3 px-6">{{ post.title }}</td>
                    <td class="py-3 px-6">
                        <button @click="remove(post.id)" class="text-red-500 hover:text-red-700">
                            Remove
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/vue3';
import { defineOptions, defineProps, ref, computed } from 'vue';

defineOptions({
    layout: DashboardLayout
});

const props = defineProps({
    errors: Object, // ✅ Explicitly define errors
    auth: Object,
    posts: {
        type: Array,
        default: () => []
    }
});

const searchQuery = ref('');
const searchedPosts = computed(() => {
    if (!searchQuery.value) return props.posts;
    return props.posts.filter(post =>
        post.title.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
});

const search = (value) => {
    searchQuery.value = value;
};
</script>
