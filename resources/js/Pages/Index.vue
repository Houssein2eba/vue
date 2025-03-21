<template>
    <Head title="Index" />
    <h1>Hello from Index</h1>
      <ul>
          <li v-for="post in posts" :key="post.id">
              {{ post.title }}-{{ post.id }}
              <button @click="remove(post.id)" class="text-red-500">remove</button>
          </li>  
      </ul>
</template>
<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/vue3';
import { defineOptions, defineProps } from 'vue';
defineOptions({
    layout: DashboardLayout
})
defineProps({
    posts: {
        type: Array,
        default: () => []
    }
})

</script>

