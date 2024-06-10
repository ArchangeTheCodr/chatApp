<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm, usePage } from '@inertiajs/vue3';


const user = usePage().props.auth.user;

const form = useForm({
    profile_picture: null,
});

const submit = () => {
    form.post(route('profile.updatePicture'), {
        forceFormData: true,
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Profile picture</h2>

            <p class="mt-1 text-sm text-gray-600">
                Update your account's profile picture
            </p>
        </header>

        <form @submit.prevent="submit" class="mt-6 space-y-6">
            <div>
                <InputLabel for="profile_picture" value="Profile picture" />

                <TextInput
                    id="profile_picture"
                    type="file"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="profile_picture"  
                    @input="form.profile_picture = $event.target.files[0]"
                />

                <InputError class="mt-2" :message="form.errors.profile_picture" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
