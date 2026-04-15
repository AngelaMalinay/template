<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    Schema::create('checks', function (Blueprint $table) {
        $table->id();
        $table->string('check_number');
        $table->string('voucher_number');
        $table->date('voucher_date');
        $table->string('payee');
        $table->decimal('amount', 15, 2);
        $table->string('remarks')->nullable(); // Halimbawa: "TCADD Fee"
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checks');
    }
};
