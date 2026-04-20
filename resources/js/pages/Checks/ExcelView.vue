<script setup>
// Function para mag-download
const downloadExcel = () => {
    window.location.href = '/download-check-excel';
};

// Hardcoded data para sa preview
const check = {
  payee: "JENNY M. TAYAMIN",
  amount: 1950.00,
  check_number: "830109",
  remarks: "TCADD Fee",
  voucher_number: "02-48749",
  voucher_date: "2/13/2025"
};

const formatNumber = (num) => {
  return parseFloat(num).toLocaleString('en-US', { minimumFractionDigits: 2 });
};
</script>

<style scoped>
@media print {
  @page {
    size: B5;
    margin: 0;
  }
  .print-container {
    width: 176mm;
    margin: 0;
    padding: 0;
    box-shadow: none;
  }
  .no-print {
    display: none !important;
  }
}

.print-container {
  width: 176mm;
  height: 250mm;
  font-family: Arial, Helvetica, sans-serif;
  color: black;
  margin: 0 auto;
  background-color: white;
}

.header-bar {
  background-color: #f3f4f6;
  -webkit-print-color-adjust: exact;
  print-color-adjust: exact;
  display: flex;
  justify-content: space-between;
  padding: 4px 12px;
  font-size: 13px;
}

.value-font {
  font-family: 'Courier New', Courier, monospace;
  font-weight: bold;
  font-size: 13px;
}

.col-label { width: 85px; font-size: 11px; font-weight: bold; }
.col-desc-main { width: 335px; } 
.col-voucher-group { width: 145px; } 
.col-credit { width: 90px; }

.section-one {
  height: 75mm;
  border-bottom: 1px dashed #bbb;
}

.section-two {
  margin-top: 1mm;
}

.sig-label {
  font-size: 9px;
  font-weight: bold;
  text-transform: none; 
}

.underline-double {
  border-bottom: 3px double black;
  line-height: 1;
}
</style>

<template>
  <div class="min-h-screen bg-gray-200 py-8">
    
    <div class="max-w-[176mm] mx-auto mb-4 flex justify-between items-center no-print">
        <div>
            <h1 class="text-xl font-bold text-gray-800">Excel Template Preview</h1>
        </div>
        <button 
            @click="downloadExcel" 
            class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded shadow hover:bg-green-700 transition"
        >
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
            Download Excel
        </button>
    </div>

    <div class="print-container p-4 leading-tight shadow-xl border border-gray-300">
        
        <div class="section-one">
          <div class="header-bar mb-4 font-bold">
            <span>BDO Corporate Check Printing</span>
            <span>Acknowledgement Receipt</span>
          </div>

          <div class="flex justify-between items-start mb-6 px-4">
            <div class="flex items-center gap-2">
              <img src="/images/ALF Logo 2022.png" alt="Logo" class="h-8 w-8 grayscale" />
              <span class="text-[9px] font-bold uppercase leading-3 w-36">ARELLANO LAW FOVNDATION</span>
            </div>
            <div class="text-right">
              <span class="text-[9px] font-bold uppercase">CHECK No.</span>
              <p class="value-font text-lg leading-none">{{ check.check_number }}</p>
            </div>
          </div>

          <div class="flex px-4">
            <div class="flex-grow flex flex-col gap-1.5">
              <div class="flex"><span class="col-label">Payee:</span><span class="value-font uppercase">{{ check.payee }}</span></div>
              <div class="flex"><span class="col-label">Amount:</span><span class="value-font">Php{{ formatNumber(check.amount) }}</span></div>
            </div>
            <div class="flex flex-col gap-1.5">
              <div class="flex"><span class="col-voucher-group col-label">Voucher No.:</span><span class="value-font">{{ check.voucher_number }}</span></div>
              <div class="flex"><span class="col-voucher-group col-label">Voucher Date:</span><span class="value-font">{{ check.voucher_date }}</span></div>
            </div>
          </div>

          <div class="flex px-4 mt-8">
            <div class="flex flex-grow">
              <span class="sig-label">Received by:</span>
              <div class="w-[280px]">
                <div class="border-b border-black w-full mt-4"></div>
                <p class="sig-label text-center mt-1">Signature over Printed Name</p>
              </div>
            </div>
            <div class="flex ml-4">
              <div class="w-[180px] text-center">
                <div class="border-b border-black w-full mt-4"></div>
                <p class="sig-label uppercase mt-1">Date</p>
              </div>
            </div>
          </div>
        </div>

        <div class="section-two">
          <div class="header-bar mb-6 font-bold">
            <span>BDO Corporate Check Printing</span>
            <span>Payment Advice</span>
          </div>

          <div class="flex justify-between items-start mb-6 px-4">
            <div class="flex items-center gap-2">
              <img src="/images/ALF Logo 2022.png" alt="Logo" class="h-8 w-8 grayscale" />
              <span class="text-[9px] font-bold uppercase leading-3 w-36">ARELLANO LAW FOVNDATION</span>
            </div>
            <div class="text-right">
              <span class="text-[9px] font-bold uppercase">CHECK No.</span>
              <p class="value-font text-lg leading-none">{{ check.check_number }}</p>
            </div>
          </div>

          <div class="flex px-4 mb-10">
            <div class="col-desc-main flex flex-col gap-1.5">
              <div class="flex"><span class="col-label">Payee:</span><span class="value-font uppercase">{{ check.payee }}</span></div>
              <div class="flex"><span class="col-label">Amount:</span><span class="value-font">Php{{ formatNumber(check.amount) }}</span></div>
              <div class="flex"><span class="col-label">Check:</span><span class="value-font">{{ check.check_number }}</span></div>
              <div class="flex"><span class="col-label">Remarks:</span><span class="value-font uppercase">{{ check.remarks }}</span></div>
            </div>
            <div class="flex flex-col gap-1.5">
              <div class="flex"><span class="col-voucher-group col-label">Voucher No.:</span><span class="value-font underline">{{ check.voucher_number }}</span></div>
              <div class="flex"><span class="col-voucher-group col-label">Voucher Date:</span><span class="value-font">{{ check.voucher_date }}</span></div>
            </div>
          </div>

          <div class="px-4">
            <div class="flex font-bold pb-1 mb-1 gap-1.5 text-[11px]">
              <span class="col-desc-main text-center underline">Account Description</span>
              <span class="col-voucher-group text-center underline">Debit</span>
              <span class="col-credit text-center underline">Credit</span>
            </div>
            <div class="flex uppercase mb-24 mt-2">
              <span class="col-desc-main font-bold text-center" style="font-size: 9px;">
                {{ check.remarks }}
              </span>
              <div class="col-voucher-group text-right">
                <span class="value-font" style="font-size: 9px;">PHP{{ formatNumber(check.amount) }}</span>
              </div>
              <div class="col-credit text-right">
                <span class="value-font" style="font-size: 9px;">PHP0.00</span>
              </div>
            </div>

            <div class="flex flex-col mt-4">
              <div class="flex font-bold">
                <div class="col-desc-main flex justify-center"><span class="text-[11px] pr-20">Total</span></div>
                <div class="col-voucher-group text-right"><span class="value-font">{{ formatNumber(check.amount) }}</span></div>
                <div class="col-credit text-right"><span class="value-font">0.00</span></div>
              </div>
              <div class="flex mt-8 font-bold items-center">
                <div class="col-desc-main flex justify-center"><span class="uppercase text-[11px] pr-20">NET</span></div>
                <div class="col-voucher-group"></div> 
                <div class="col-credit text-right">
                  <span class="value-font underline-double" style="font-size: 11px;">{{ formatNumber(check.amount) }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>
</template>