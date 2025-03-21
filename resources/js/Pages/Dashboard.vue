<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';

defineOptions({
    layout: DashboardLayout
})
</script>

<template>
    <Head title="Dashboard" />
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Stats Cards -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800">Total Items</h3>
            <p class="text-3xl font-bold text-blue-600 mt-2">1,234</p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800">Low Stock Items</h3>
            <p class="text-3xl font-bold text-red-600 mt-2">12</p>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800">Total Value</h3>
            <p class="text-3xl font-bold text-green-600 mt-2">$45,678</p>
        </div>

        <!-- Recent Activity -->
        <div class="col-span-full bg-white rounded-lg shadow p-6 mt-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Activity</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between border-b pb-4">
                    <div>
                        <p class="font-medium">Product A stock updated</p>
                        <p class="text-sm text-gray-500">Quantity: +50</p>
                    </div>
                    <span class="text-sm text-gray-500">2 hours ago</span>
                </div>
                <div class="flex items-center justify-between border-b pb-4">
                    <div>
                        <p class="font-medium">Product B stock low</p>
                        <p class="text-sm text-gray-500">Quantity: 5 remaining</p>
                    </div>
                    <span class="text-sm text-gray-500">5 hours ago</span>
                </div>
            </div>
        </div>
    </div>
</template>