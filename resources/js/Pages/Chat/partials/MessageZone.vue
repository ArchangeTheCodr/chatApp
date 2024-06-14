<script setup>
    import TextInput from '@/Components/TextInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';

    import { router, useForm } from '@inertiajs/vue3';
    import { computed, watch } from 'vue'
    import { usePage } from '@inertiajs/vue3'

   const props = defineProps({
        messages: {
            type: Array,
            required : true
        },
        selectedUser: {
            type: Number,
            required : true
        },
    })

    //Gestion de l'envoi du message
    const page = usePage()
    const sender = computed(() => page.props.auth.user)

    //Ecoute du changement du user selectionne
    watch(() => props.selectedUser, (newSelectedUser) => {
        form.receiver_id = newSelectedUser;
    });

    const form = useForm({
        sender_id: sender.value.id,
        receiver_id: props.selectedUser,
        text: '',
    })


    function sendMessage(){
        router.post('/messages', form)
    }

</script>

<template>
    <div class="test p-10">
        <div id="one">
            <div 
                v-for="message in messages" 
                :key="message.id"
                :class="message.sender_id === 1 ? 
                    'left msg flex flex-col mt-6 max-w-80 ' :
                    'right msg flex flex-col mt-6 max-w-80 '"
                
            >
            <p>{{ message.text }}</p>
            <span>{{ message.name }}</span>
        </div>
        </div>

        <div class="form">
            <div class="">
                <form @submit.prevent="sendMessage">
                    <TextInput
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.text"
                        required
                        autofocus
                    />
                    <!-- <input type="hidden" 
                        v-model="form.receiver_id"
                        :value="props.selectedUser"
                    />  -->
                    <PrimaryButton>Send</PrimaryButton>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .msg{
        box-shadow: 2em;
        border: 3px solid #b9b6b6;
    }
    .test{
        background-color: azure;
        width: 100%;
    }
    .form{
        margin-top: 60px;
        margin-bottom: 0;
        border: 2px solid #181a6b;
    }

    .left{
        margin-left: 10px;
    }
    .right{
        margin-left: 500px;
    }

    #one{
        border: 1px solid #fd08c8;
        display: block;
    }
</style>