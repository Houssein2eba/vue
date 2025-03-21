<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

const isSidebarOpen = ref(false);
const isPostsMenuOpen = ref(false);
</script>

<template>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out md:translate-x-0"
            :class="{ '-translate-x-full': !isSidebarOpen }"
        >
            <div class="flex flex-col h-full p-6">
                <h2 class="text-2xl font-bold text-gray-800">Stock Manager</h2>
                
                <!-- Navigation -->
                <nav class="mt-6 flex-grow space-y-2">
                    <Link
                        :href="route('dashboard')"
                        class="flex items-center py-3 px-4 rounded-lg text-gray-700 font-medium transition hover:bg-gray-200"
                    >
                        📊 Dashboard
                    </Link>
                    <Link
                        href="/"
                        class="flex items-center py-3 px-4 rounded-lg text-gray-700 font-medium transition hover:bg-gray-200"
                    >
                        🏠 Home
                    </Link>
                    <Link
                        href="/posts/create"
                        class="flex items-center py-3 px-4 rounded-lg text-gray-700 font-medium transition hover:bg-gray-200"
                    >
                        ✍️ Create Post
                    </Link>

                    <!-- Posts Dropdown -->
                    <div class="relative">
                        <button
                            @click="isPostsMenuOpen = !isPostsMenuOpen"
                            class="flex justify-between items-center w-full py-3 px-4 rounded-lg text-gray-700 font-medium transition hover:bg-gray-200"
                        >
                            📝 Posts
                            <svg
                                class="w-5 h-5 transform transition-transform"
                                :class="{ 'rotate-180': isPostsMenuOpen }"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div
                            v-if="isPostsMenuOpen"
                            class="mt-2 bg-white shadow-md rounded-lg p-2 space-y-1"
                        >
                            <Link
                                :href="route('posts.index')"
                                class="block py-2 px-4 rounded-lg text-gray-700 font-medium transition hover:bg-gray-200"
                            >
                                📌 All Posts
                            </Link>
                            <Link
                                :href="route('posts.create')"
                                class="block py-2 px-4 rounded-lg text-gray-700 font-medium transition hover:bg-gray-200"
                            >
                                ➕ Create Post
                            </Link>
                            <Link
                                href="/posts/latest"
                                class="block py-2 px-4 rounded-lg text-gray-700 font-medium transition hover:bg-gray-200"
                            >
                                🔥 Latest Posts
                            </Link>
                        </div>
                    </div>

                    <Link
                        href="/transactions"
                        class="flex items-center py-3 px-4 rounded-lg text-gray-700 font-medium transition hover:bg-gray-200"
                    >
                        💰 Transactions
                    </Link>
                </nav>

                <!-- Logout Button -->
                <div class="mt-auto">
                    <button class="w-full bg-red-500 text-white py-3 px-4 rounded-lg font-medium hover:bg-red-600 transition">
                        🚪 Logout
                    </button>
                </div>
            </div>
        </aside>

        <!-- Sidebar Overlay (Mobile) -->
        <div
            v-if="isSidebarOpen"
            @click="isSidebarOpen = false"
            class="fixed inset-0 bg-black bg-opacity-50 md:hidden transition-opacity"
        ></div>

        <!-- Main Content -->
        <div class="flex-1 md:ml-64">
            <!-- Header -->
            <header class="bg-white shadow-md px-6 py-4 flex items-center justify-between">
                <button
                    @click="isSidebarOpen = !isSidebarOpen"
                    class="md:hidden text-gray-700 hover:text-gray-900 transition"
                >
                    ☰
                </button>

                <div class="ml-auto relative">
                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <button
                                type="button"
                                class="flex items-center rounded-lg bg-gray-200 px-4 py-3 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none"
                            >
                                {{ $page.props.auth.user.name }}
                                <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        </template>

                        <template #content>
                            <DropdownLink :href="route('profile.edit')">
                                Profile
                            </DropdownLink>
                            <DropdownLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </DropdownLink>
                        </template>
                    </Dropdown>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                <slot></slot>
            </main>
        </div>
    </div>
</template>
