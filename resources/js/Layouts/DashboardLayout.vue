<script setup>
import { ref } from 'vue';

const isSidebarOpen = ref(false);
const isPostsMenuOpen = ref(true);
</script>

<template>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg transform transition-transform duration-200 md:translate-x-0"
             :class="{ '-translate-x-full': !isSidebarOpen }">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800">Stock Manager</h2>
                <nav class="mt-6">
                    
                    <Link :href=" route('dashboard') " class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                        Dashboard
                    </Link>
                    <Link :href="route('index') " class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                        Home
                    </Link>
                    <Link :href="route('post.create')" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                        Create Post
                    </Link>
                    <!-- Post Dropdown -->
                    <div class="relative" @click="isPostsMenuOpen = !isPostsMenuOpen">
                        <button 
                            class="flex justify-between items-center w-full py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                            Posts
                            <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': isPostsMenuOpen}" 
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div v-if="isPostsMenuOpen" class="mt-2 bg-white shadow-md rounded-lg">
                            <Link href="/home" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                                All Posts
                            </Link>
                            <Link href="/home" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                                Create Post
                            </Link>
                            <Link href="/home" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                                Latest Posts
                            </Link>
                        </div>
                    </div>

                    <a href="/transactions" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                        Transactions
                    </a>
                </nav>
            </div>
        </div>

        <!-- Overlay for Sidebar on Mobile -->
        <div v-if="isSidebarOpen" @click="isSidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 md:hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 md:ml-64">
            <!-- Header -->
            <header class="bg-white shadow px-4 py-4">
                <button @click="isSidebarOpen = !isSidebarOpen" 
                        class="md:hidden p-2 rounded-md hover:bg-gray-100">
                    <span class="sr-only">Toggle Menu</span>
                    <!-- Menu Icon -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                <slot></slot>
            </main>
        </div>
    </div>
</template>
