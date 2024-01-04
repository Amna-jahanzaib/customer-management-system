<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from "@inertiajs/vue3";

const customersRoute = '/customers';

defineProps({
    customer: {
        type: Object,
    },

});
</script>

<template>
    <Head title="Customer Details" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Customer Details</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tr>
                            <th class="text-base text-gray-700 pt-2 pb-2 uppercase justify-between">
                                ID
                            </th>
                            <td>
                                {{ customer.id }}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-base text-gray-700 pt-2 pb-2  justify-between">Name</th>
                            <td>{{ customer.user.name }}</td>
                        </tr>
                        <tr>
                            <th class="text-base text-gray-700 pt-2 pb-2  justify-between">Email</th>
                            <td>{{ customer.user.email }}</td>
                        </tr>
                        <tr>
                            <th class="text-base text-gray-700 pt-2 pb-2  justify-between">Phone</th>
                            <td>{{ customer.phone }}</td>
                        </tr>
                        <tr>
                            <th class="text-base text-gray-700 pt-2 pb-2  justify-between">Address</th>
                            <td>{{ customer.address }}</td>
                        </tr>
                        <tr>
                            <th class="text-base text-gray-700 pt-2 pb-2  justify-between">City</th>
                            <td>{{ customer.city }}</td>
                        </tr>
                        <tr>
                            <th class="text-base text-gray-700 pt-2 pb-2  justify-between">Country</th>
                            <td>{{ customer.country }}</td>

                        </tr>
                        <tr>
                            <th class="text-base text-gray-700 pt-2 pb-2  justify-between">Postcode</th>
                            <td>{{ customer.postcode }}</td>

                        </tr>
                    </table>
                    <div class="flex  justify-between">
                        <Link :href="route('customers.index')"
                            class="flex  mt-2 mb-2 px-4 py-2 bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-grey uppercase  hover:bg-slate-500 active:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Back
                        </Link>
                    </div>
                </div>


            </div>
        </div>
    </AuthenticatedLayout>
</template>

