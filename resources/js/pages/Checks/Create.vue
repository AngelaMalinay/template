<script setup>
import { useForm, Link } from '@inertiajs/vue3';
// Kung may error sa AppLayout, i-check kung tama ang path ng layouts folder niyo
import AppLayout from '@/layouts/AppLayout.vue'; 

const form = useForm({
    check_number: '',
    voucher_number: '',
    voucher_date: '',
    payee: '',
    amount: '',
    account_description: '',
    remarks: '',
});

const submit = () => {
    form.post(route('checks.store'));
};
</script>

<template>
    <AppLayout title="Create Check">
        <div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">Add New Check Record</h1>
                <Link :href="route('checks.index')" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm">
                    &larr; Back to List
                </Link>
            </div>

            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="col-span-2 md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700">Payee</label>
                            <input v-model="form.payee" type="text" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <div v-if="form.errors.payee" class="text-red-500 text-xs mt-1">{{ form.errors.payee }}</div>
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label class="block text-sm font-medium text-gray-700">Amount (Php)</label>
                            <input v-model="form.amount" type="number" step="0.01" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <div v-if="form.errors.amount" class="text-red-500 text-xs mt-1">{{ form.errors.amount }}</div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Check No.</label>
                            <input v-model="form.check_number" type="text" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <div v-if="form.errors.check_number" class="text-red-500 text-xs mt-1">{{ form.errors.check_number }}</div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Voucher No.</label>
                            <input v-model="form.voucher_number" type="text" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <div v-if="form.errors.voucher_number" class="text-red-500 text-xs mt-1">{{ form.errors.voucher_number }}</div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Voucher Date</label>
                            <input v-model="form.voucher_date" type="date" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <div v-if="form.errors.voucher_date" class="text-red-500 text-xs mt-1">{{ form.errors.voucher_date }}</div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Account Description</label>
                            <input v-model="form.account_description" type="text" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <div v-if="form.errors.account_description" class="text-red-500 text-xs mt-1">{{ form.errors.account_description }}</div>
                        </div>

                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Remarks</label>
                            <input v-model="form.remarks" type="text" placeholder="Halimbawa: TCADD Fee" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <div v-if="form.errors.remarks" class="text-red-500 text-xs mt-1">{{ form.errors.remarks }}</div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6 border-t pt-4 border-gray-100">
                        <button type="submit" :disabled="form.processing" class="bg-indigo-600 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 disabled:opacity-50 transition">
                            Save Check Record
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>