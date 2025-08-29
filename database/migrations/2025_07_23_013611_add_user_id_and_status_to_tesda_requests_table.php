<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tesda_requests', function (Blueprint $table) {
            // Remove user_id since it already exists
            if (!Schema::hasColumn('tesda_requests', 'status')) {
                $table->string('status')->default('Pending')->after('message');
            }
        });
    }

    public function down(): void
    {
        Schema::table('tesda_requests', function (Blueprint $table) {
            if (Schema::hasColumn('tesda_requests', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
