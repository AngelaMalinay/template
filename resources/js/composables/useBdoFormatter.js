export function useBdoFormatter() {
    const formatNumber = (num) => {
        if (num === null || num === undefined) return "0.00";
        const cleanNum = typeof num === 'string' ? num.replace(/,/g, '') : num;
        const value = parseFloat(cleanNum);
        return isNaN(value) ? "0.00" : value.toLocaleString('en-US', { 
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    };

    const formatDateForCheck = (dateStr) => {
        if (!dateStr) return '';
        const digits = dateStr.replace(/[^0-9]/g, '').split('');
        return digits.join('  '); 
    };

    const amountToWords = (num) => {
        // Logic for converting numbers to words can be added here
        return "ONE THOUSAND NINE HUNDRED FIFTY ONLY"; 
    };

    return { formatNumber, formatDateForCheck, amountToWords };
}