<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import DeleteCustomer from './Partials/Delete.vue';


const props = defineProps({
    customers: {
        type: Object,
    },
    permissions: {
        type: Object,
    },

});

</script>

<template>
    <Head title="Customers" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Customers</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                <div class="p-4 sm:p-8 bg-white sm:rounded-lg">
                    <div v-if="$page.props.flash.message" class="text-blue-600 mb-4">
                        {{ $page.props.flash.message }} </div>
                    <Link v-if="$props.permissions.create_customer"
                        class="mb-4 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        :href="route('customers.create')">
                    Add New Customer
                    </Link>
                    <div class="px-1 pt-10">

                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="customer in customers.data" v-bind:key="customer.id"
                                class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10 justify-between">
                                <td>{{ customer.id }}</td>
                                <td>{{ customer.user.name }}</td>
                                <td>{{ customer.user.email }}</td>
                                <td>{{ customer.phone }}</td>
                                <td>{{ customer.address }}</td>
                                <td>{{ customer.city }}</td>
                                <td>{{ customer.country }}</td>
                                <td>
                                    <div class="flex  justify-between">
                                        <Link v-if="$props.permissions.view_customer"
                                            :href="route('customers.show', customer.id)"
                                            class="flex ml-2 mr-2 mt-2 mb-2 px-4 py-2 bg-cyan-400/100 border border-transparent rounded-md font-semibold text-xs text-white uppercase  hover:bg-sky-500 active:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Show
                                        </Link>
                                        <Link v-if="$props.permissions.edit_customer"
                                            :href="route('customers.edit', customer.id)"
                                            class="flex  mt-2 mb-2 px-4 py-2 bg-slate-300 border border-transparent rounded-md font-semibold text-xs text-white uppercase  hover:bg-slate-500 active:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Edit
                                        </Link>
                                        <div v-if="props.permissions.delete_customer">
                                            <DeleteCustomer :customer_id="customer.id" />
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="9">
                                    <div>
                                        <Link v-for=" (link, index) in customers.links" :key="index" :href="link.url"
                                            class="px-1 border-2" v-html="link.label" />
                                    </div>

                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

