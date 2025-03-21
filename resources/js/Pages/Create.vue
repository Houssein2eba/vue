<script setup>
import { ref, defineOptions,reactive } from 'vue';
import {useForm} from '@inertiajs/vue3';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
const title = ref('');
const body = ref('');

defineOptions({
    layout: DashboardLayout
})
const form=useForm({
    title: null,
    body: null
})

</script>

<template>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-6 rounded-2xl shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Create a Post</h2>
            <form @submit.prevent="form.post('/store')">
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Title</label>
                    <input v-model="form.title" type="text" placeholder="Enter title"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                <span class="text-red-500" v-if="form.errors.title">{{ form.errors.title }}</span>
                        
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Body</label>
                    <textarea v-model="form.body" rows="4" placeholder="Enter body"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                <span class="text-red-500" v-if="form.errors.body">{{ form.errors.body }}</span>

                </div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white font-bold py-2 rounded-lg hover:bg-blue-600 transition">
                    Submit
                </button>
            </form>
        </div>
    </div>
</template>

