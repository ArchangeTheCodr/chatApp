<script setup>
    import { defineProps } from 'vue';

    defineProps({
        users: {
            type: Array,
            required: true
        }
    })
</script>

<template>
    <div class="flex flex-col gill">
        <div class="list flex justify-around mx-20" v-for="user in users" :key="user.id">
            <img 
                :src="user.profile_picture" 
                class="h-12 rounded-full max-w-full max-h-full mt-6"
            />
            <p>{{ user.name }}</p>
        </div>
    </div>
</template>

<style scoped>
    .list{
        max-width: 100px;
        border: 1px solid #f77171;
    }

.gill{
        border: 1px solid #0eaa35;
    }
</style>