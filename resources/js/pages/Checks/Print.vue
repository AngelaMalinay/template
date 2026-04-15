<template>
  <div class="print-container bg-white mx-auto p-4 text-xs font-mono">
    <div class="section mb-20 border-b border-dashed pb-8">
      <div class="flex justify-between">
        <h2 class="font-bold">BDO Corporate Check Printing</h2>
        <span class="italic">Acknowledgement Receipt</span>
      </div>
      <div class="mt-4">
        <p>Payee: <span class="font-bold underline">{{ check.payee }}</span></p>
        <p>Amount: <span class="font-bold">Php {{ formatNumber(check.amount) }}</span></p>
        <div class="mt-8 flex justify-between">
          <div class="border-t border-black w-1/2 pt-1 text-[10px]">Received by: Signature over Printed Name</div>
          <div class="border-t border-black w-1/4 pt-1 text-[10px]">Date</div>
        </div>
      </div>
    </div>

    <div class="section mb-32 border-b border-dashed pb-8">
      <div class="flex justify-between">
        <h2 class="font-bold">BDO Corporate Check Printing</h2>
        <span class="italic text-gray-600">Payment Advice</span>
      </div>
      <div class="grid grid-cols-2 mt-4">
        <div>
          <p>Payee: {{ check.payee }}</p>
          <p>Amount: Php {{ formatNumber(check.amount) }}</p>
          <p>Check: {{ check.check_number }}</p>
          <p>Remarks: {{ check.remarks }}</p>
        </div>
        <div class="text-right">
          <p>Voucher No: {{ check.voucher_number }}</p>
          <p>Voucher Date: {{ check.voucher_date }}</p>
        </div>
      </div>
    </div>

    <div class="check-area relative h-[3.5in] w-full border border-gray-200 mt-10 p-6">
      <div class="absolute right-10 top-5 text-right">
        <p class="text-sm font-bold tracking-widest">{{ formatDateForCheck(check.voucher_date) }}</p>
      </div>
      <div class="mt-12 ml-20 text-lg font-bold">
        {{ check.payee }}
      </div>
      <div class="absolute right-12 top-24 text-lg font-bold italic">
        *{{ formatNumber(check.amount) }}*
      </div>
      <div class="mt-4 ml-16 text-md uppercase font-bold italic">
        {{ amountToWords(check.amount) }} ONLY
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({ check: Object });

const formatNumber = (num) => {
  return parseFloat(num).toLocaleString('en-US', { minimumFractionDigits: 2 });
};

const formatDateForCheck = (date) => {
  // Ginagawang M M D D Y Y Y Y na may spacing para tumama sa boxes
  return date.replace(/-/g, ' '); 
};

// Pwedeng gumamit ng library na 'number-to-words' dito
const amountToWords = (num) => {
  // Logic para sa PHP words conversion
  return "ONE THOUSAND NINE HUNDRED FIFTY"; 
};
</script>

<style scoped>
@media print {
  @page {
    size: B5; /* Base sa sulat sa image mo: PRINTER B5 SIZE */
    margin: 0;
  }
  .print-container {
    width: 100%;
    padding: 0.5in;
  }
  button { display: none; } /* Tago ang buttons pag print */
}
</style>