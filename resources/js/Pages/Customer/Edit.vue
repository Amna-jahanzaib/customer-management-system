<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    customer: {
        type: Object,
    },

});

const form = useForm({
    name: props.customer.user.name,
    email: props.customer.user.email,
    address: props.customer.address,
    phone: props.customer.phone,
    city: props.customer.city,
    country: props.customer.country,
    postcode: props.customer.postcode,
});


const submit = () => {
    form.patch(route('customers.update', props.customer.id), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AuthenticatedLayout>

        <Head title="Register" />
        <!-- component -->
        <div class="max-w-2xl bg-white py-10 px-5 m-auto w-full mt-10">

            <div class="text-3xl mb-6 text-center ">
                Update Customer Details
            </div>
            <form @submit.prevent="submit">
                <div class="grid grid-cols-2 gap-4 max-w-xl m-auto mt-4">
                    <div>
                        <InputLabel for="name" value="Name" />

                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                            autocomplete="name" />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="">
                        <InputLabel for="email" value="Email" />

                        <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                            disabled />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>


                </div>


                <div class="grid max-w-xl m-auto mt-4">
                    <InputLabel for="address" value="Address" />

                    <TextArea id="address" class="mt-1 block w-full" v-model="form.address" required autofocus
                        autocomplete="address">
                            </TextArea>
                    <InputError class="mt-2" :message="form.errors.address" />
                </div>
                <div class="grid grid-cols-2 gap-4 max-w-xl m-auto mt-4">
                    <div>

                        <InputLabel for="address" value="Phone" />

                        <TextInput id="phone" type="text" class="mt-1 block w-full" v-model="form.phone" required autofocus
                            autocomplete="phone" />

                        <InputError class="mt-2" :message="form.errors.phone" />
                    </div>
                    <div>
                        <InputLabel for="postcode" value="Postcode" />

                        <TextInput id="postcode" type="text" class="mt-1 block w-full" v-model="form.postcode" required
                            autofocus autocomplete="postcode" />

                        <InputError class="mt-2" :message="form.errors.postcode" />
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 max-w-xl m-auto mt-4">
                    <div>
                        <InputLabel for="city" value="City" />

                        <TextInput id="city" type="text" class="mt-1 block w-full" v-model="form.city" required autofocus
                            autocomplete="city" />

                        <InputError class="mt-2" :message="form.errors.city" />
                    </div>

                    <div class="">
                        <InputLabel for="country" value="Country" />

                        <TextInput id="country" type="text" class="mt-1 block w-full" v-model="form.country" required
                            autocomplete="country" />

                        <InputError class="mt-2" :message="form.errors.country" />
                    </div>

                </div>


                <div class="flex max-w-xl m-auto mt-4 items-center justify-between mt-4">
                    <Link
                        class="flex  mt-2 mb-2 px-4 py-2 bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-grey uppercase  hover:bg-slate-500 active:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        :href="route('customers.index')">
                    Back
                    </Link>

                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Update
                    </PrimaryButton>
                </div>
            </form>

        </div>
    </AuthenticatedLayout>
</template>
