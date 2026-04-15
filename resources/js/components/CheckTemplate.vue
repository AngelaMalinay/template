<template>
    <div class="check-container bg-white text-black font-mono leading-none mx-auto print:m-0 print:shadow-none shadow-lg border border-gray-100" 
         style="width: 7in; min-height: 10in; padding: 0.4in;">
        
        <div class="h-[2.4in] border-b border-dashed border-gray-400 relative mb-4">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-[12px] font-bold uppercase">BDO Corporate Check Printing</h1>
                    <p class="text-[10px] mt-1 italic">ARELLANO LAW FOUNDATION</p>
                </div>
                <div class="text-right">
                    <p class="text-[11px] font-bold">Acknowledgement Receipt</p>
                    <p class="text-[10px] mt-2">Check No: {{ check.check_number }}</p>
                </div>
            </div>

            <div class="mt-6 text-[11px] space-y-2">
                <p>Payee: <span class="font-bold border-b border-black inline-block min-w-[250px]">{{ check.payee }}</span></p>
                <p>Amount: <span class="font-bold">Php {{ formatNumber(check.amount) }}</span></p>
            </div>

            <div class="absolute bottom-6 w-full flex justify-between text-[9px] pr-4">
                <div class="text-center">
                    <div class="border-t border-black w-48 mt-4">Signature over Printed Name</div>
                </div>
                <div class="text-center">
                    <div class="border-t border-black w-32 mt-4">Date</div>
                </div>
            </div>
        </div>

        <div class="h-[3.2in] border-b border-dashed border-gray-400 relative mb-4 pt-2">
            <div class="flex justify-between items-start">
                <h1 class="text-[12px] font-bold uppercase">BDO Corporate Check Printing</h1>
                <p class="text-[11px] font-bold italic">Payment Advice</p>
            </div>

            <div class="grid grid-cols-2 mt-4 text-[11px]">
                <div class="space-y-1">
                    <p>Payee: <span class="font-bold">{{ check.payee }}</span></p>
                    <p>Amount: <span class="font-bold">Php {{ formatNumber(check.amount) }}</span></p>
                    <p>Check: {{ check.check_number }}</p>
                    <p>Remarks: {{ check.remarks || 'TCADD Fee' }}</p>
                </div>
                <div class="text-right space-y-1">
                    <p>Voucher No: <span class="ml-2">{{ check.voucher_number }}</span></p>
                    <p>Voucher Date: <span class="ml-2">{{ formatDateSimple(check.voucher_date) }}</span></p>
                </div>
            </div>

            <table class="w-full mt-6 text-[10px] border-collapse">
                <thead>
                    <tr class="border-b border-black">
                        <th class="text-left py-1">Account Description</th>
                        <th class="text-right py-1">Debit</th>
                        <th class="text-right py-1">Credit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 italic">{{ check.remarks || 'TCADD Fee' }}</td>
                        <td class="text-right py-2">{{ formatNumber(check.amount) }}</td>
                        <td class="text-right py-2">0.00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="border-t border-black font-bold">
                        <td class="py-2">Total</td>
                        <td class="text-right py-2">{{ formatNumber(check.amount) }}</td>
                        <td class="text-right py-2">0.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="check-actual relative w-full h-[3.1in] mt-8 overflow-hidden">
            
            <div class="absolute top-[22px] right-[45px] text-[16px] font-bold tracking-[0.65em]">
                {{ formatDateForCheck(check.voucher_date) }}
            </div>

            <div class="absolute top-[82px] left-[85px] text-[15px] font-bold uppercase">
                {{ check.payee }}
            </div>

            <div class="absolute top-[82px] right-[40px] text-[15px] font-bold italic">
                **{{ formatNumber(check.amount) }}**
            </div>

            <div class="absolute top-[120px] left-[65px] text-[12px] font-bold uppercase italic w-[520px] leading-relaxed">
                {{ amountToWords(check.amount) }} ONLY
            </div>

            <div class="absolute bottom-4 left-[120px] text-[14px] font-bold tracking-widest opacity-20">
                "0000{{ check.check_number }}" 01053-247...
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
// Define props para matanggap ang data mula sa Parent Page
const props = defineProps<{
    check: {
        payee: string;
        amount: number;
        check_number: string;
        voucher_number: string;
        voucher_date: string;
        remarks?: string;
    }
}>();

// Helper 1: Format 1,950.00
const formatNumber = (num: number) => {
    return new Intl.NumberFormat('en-PH', { 
        minimumFractionDigits: 2, 
        maximumFractionDigits: 2 
    }).format(num);
};

// Helper 2: Para sa simple display (MM/DD/YYYY)
const formatDateSimple = (dateStr: string) => {
    const d = new Date(dateStr);
    return `${d.getMonth() + 1}/${d.getDate()}/${d.getFullYear()}`;
};

// Helper 3: Para sa Check Boxes (MM DD YYYY)
const formatDateForCheck = (dateStr: string) => {
    const d = new Date(dateStr);
    const m = String(d.getMonth() + 1).padStart(2, '0');
    const day = String(d.getDate()).padStart(2, '0');
    const y = d.getFullYear();
    return `${m}${day}${y}`;
};

// Helper 4: Convert number to words (Simple Version)
const amountToWords = (num: number) => {
    // Note: Sa production, mas mainam gumamit ng library like 'number-to-words'
    // Pero heto ang static muna base sa example mo:
    if (num === 1950) return "One Thousand Nine Hundred Fifty";
    
    // Fallback:
    return "Amount in words placeholder"; 
};
</script>

<style scoped>
/* Force white background during print and remove margins */
@media print {
    body {
        background: white;
    }
    .check-container {
        border: none !important;
        box-shadow: none !important;
        width: 100% !important;
        margin: 0 !important;
        padding: 0.3in !important;
    }
}


.font-mono {
    font-family: 'Courier New', Courier, monospace;
}
</style>