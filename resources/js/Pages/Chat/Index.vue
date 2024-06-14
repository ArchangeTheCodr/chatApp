<script setup>
    import { Head } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { defineEmits } from 'vue';
    import { ref, watch } from 'vue'

    import UserList from'./partials/UserList.vue';
    import MessageZone from'./partials/MessageZone.vue';

    defineProps({
        users: {
            type: Array,
            required: true
        },
    })

    //////Gestion de l'affichage des messages
    // const emit = defineEmits(['get_receiver_id'])
    const messages = ref([])
    const selectedUser = ref(0 )

    function handleUserSelected(id){
        selectedUser.value = id
        axios.get('/messages/'+ id)
        .then((response) => {
            messages.value = response.data.messages
        })
        .catch(error => console.log(error))
    }
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
                    <UserList 
                        :users="users"
                        @userSelected="handleUserSelected"
                    />
                    <div v-if="messages">
                        <MessageZone 
                        :selectedUser="selectedUser"
                            :messages="messages"
                        />
                    </div>
                    <div v-else>Empty set</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped></style>