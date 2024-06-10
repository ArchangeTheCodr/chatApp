<script setup>
    import TextInput from '@/Components/TextInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';


    defineProps({
        messages:{
            type: Array,
            required: true
        }
    })
</script>

<template>
    <div class="test p-10">
        <div id="one">
            <div 
                v-for="message in messages" 
                :key="message.id"
                :class="message.sender === 1 ? 
                    'left msg flex flex-col mt-6 max-w-80 ' :
                    'right msg flex flex-col mt-6 max-w-80 '"
                
            >
            <p>{{ message.text }}</p>
            <span>{{ message.name }}</span>
        </div>
        </div>

        <div class="form">
            <div class="">
                <form>
                    <TextInput
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                    />
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
        margin-left: 100px;
    }
    .right{
        margin-left: 500px;
    }

    #one{
        border: 1px solid #a32187;
        display: block;
    }
</style>