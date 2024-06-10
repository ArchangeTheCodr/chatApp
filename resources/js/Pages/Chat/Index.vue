<script setup>
    import { Head } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import UserList from'./partials/UserList.vue';
    import MessageZone from'./partials/MessageZone.vue';

    defineProps({
        users: {
            type: Array,
            required: true
        },
    })

    const messages =[
        {
            sender: 1,
            name: "lala",
            text: "Hello Bro"
        },
        {
            sender: 2,
            name: "lolo",
            text: "Hello. bien ou bien ??"
        },
        {
            sender: 1,
            name: "lala",
            text: "Super. on se voit a 14h ?"
        },
        {
            sender: 2,
            name: "lolo",
            text: "Ouaip. A toute babe !!!"
        },
    ];
</script>

<template>
    <Head title="Chat" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Chat</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between">
                    <UserList :users="users"/>
                    <MessageZone :messages="messages"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped></style>