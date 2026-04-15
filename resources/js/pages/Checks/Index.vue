<template>
    <AppLayout title="Check Management">
        <div class="p-8 bg-gray-50 min-h-screen">
            <div class="max-w-6xl mx-auto">
                
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Check Printing Management</h1>
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700">
                        + New Check
                    </button>
                </div>

                <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-200">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-100 border-b border-gray-200 text-gray-600 text-xs uppercase font-semibold">
                            <tr>
                                <th class="px-6 py-4">Voucher Date</th>
                                <th class="px-6 py-4">Check No.</th>
                                <th class="px-6 py-4">Payee</th>
                                <th class="px-6 py-4">Amount</th>
                                <th class="px-6 py-4 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr v-for="check in checks" :key="check.id" class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm">{{ check.voucher_date }}</td>
                                <td class="px-6 py-4 text-sm font-mono">{{ check.check_number }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ check.payee }}</td>
                                <td class="px-6 py-4 text-sm text-green-600 font-bold">
                                    ₱ {{ formatNumber(check.amount) }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <Link 
                                        :href="route('checks.print', { check: check.id })" 
                                        class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full hover:bg-blue-200 transition"
                                    >
                                        <Printer class="w-3 h-3 mr-1" />
                                        PRINT
                                    </Link>
                                </td>
                            </tr>
                            <tr v-if="checks.length === 0">
                                <td colspan="5" class="px-6 py-10 text-center text-gray-500 italic">
                                    No check records found.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue'; 
import { Link } from '@inertiajs/vue3';
import { Printer } from 'lucide-vue-next';

// STEP 1: Gawa tayo ng Interface para malaman ni TS ang properties ng check
interface Check {
    id: number;
    check_number: string;
    voucher_number: string;
    voucher_date: string;
    payee: string;
    amount: number;
    remarks?: string;
}

// STEP 2: Gamitin ang interface sa defineProps
defineProps<{
    checks: Check[]; // Ibig sabihin, array ito ng Check objects
}>();

const formatNumber = (num: any) => {
    const value = typeof num === 'string' ? parseFloat(num) : num;
    return value.toLocaleString('en-PH', { 
        minimumFractionDigits: 2, 
        maximumFractionDigits: 2 
    });
};
</script>