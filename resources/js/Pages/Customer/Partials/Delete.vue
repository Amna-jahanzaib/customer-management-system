<script setup>
import TableDangerButton from '@/Components/TableDangerButton.vue';
import Modal from '@/Components/Modal.vue';
import TableInfoButton from '@/Components/TableInfoButton.vue';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3'


const props = defineProps({
    customer_id: Object,

});

const confirmingCustomerDeletion = ref(false);

const confirmUserDeletion = () => {
    confirmingCustomerDeletion.value = true;
};

const deleteCustomer = () => {
    router.delete(`/customers/${props.customer_id}`, {
        onSuccess: closeModal(),

})
        
};

const closeModal = () => {
    confirmingCustomerDeletion.value = false;
};
</script>

<template>
    <section class="space-y-6">


        <TableDangerButton @click="confirmUserDeletion">Delete</TableDangerButton>

        <Modal :show="confirmingCustomerDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete cutomer data?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Once customer details are deleted, all of its resources and data will be permanently deleted.
                </p>


                <div class="mt-6 flex justify-end">
                    <TableInfoButton @click="closeModal"> Cancel </TableInfoButton>

                    <TableDangerButton class="ms-3" @click="deleteCustomer()">
                        Delete Customer
                    </TableDangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
