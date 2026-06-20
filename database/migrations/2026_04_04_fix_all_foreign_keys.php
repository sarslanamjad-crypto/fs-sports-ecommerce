<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Fix cart_items foreign key - add it if it doesn't exist
        if (Schema::hasTable("cart_items")) {
            Schema::table("cart_items", function (Blueprint $table) {
                try {
                    $table->dropForeign("cart_items_user_id_foreign");
                } catch (\Exception $e) {}

                $table->foreign("user_id")
                    ->references("id")
                    ->on("registration")
                    ->onDelete("cascade");
            });
        }

        // Fix orders_transactions foreign key
        if (Schema::hasTable("orders_transactions")) {
            Schema::table("orders_transactions", function (Blueprint $table) {
                try {
                    $table->dropForeign("orders_transactions_user_id_foreign");
                } catch (\Exception $e) {}

                $table->foreign("user_id")
                    ->references("id")
                    ->on("registration")
                    ->onDelete("cascade");
            });
        }

        // Fix group_purchases foreign key
        if (Schema::hasTable("group_purchases")) {
            Schema::table("group_purchases", function (Blueprint $table) {
                try {
                    $table->dropForeign("group_purchases_group_lead_id_foreign");
                } catch (\Exception $e) {}

                $table->foreign("group_lead_id")
                    ->references("id")
                    ->on("registration")
                    ->onDelete("cascade");
            });
        }

        // Fix product_reviews foreign key
        if (Schema::hasTable("product_reviews")) {
            Schema::table("product_reviews", function (Blueprint $table) {
                try {
                    $table->dropForeign("product_reviews_user_id_foreign");
                } catch (\Exception $e) {}

                $table->foreign("user_id")
                    ->references("id")
                    ->on("registration")
                    ->onDelete("cascade");
            });
        }

        // Fix audit_trail foreign key
        if (Schema::hasTable("audit_trail")) {
            Schema::table("audit_trail", function (Blueprint $table) {
                try {
                    $table->dropForeign("audit_trail_user_id_foreign");
                } catch (\Exception $e) {}

                $table->foreign("user_id")
                    ->references("id")
                    ->on("registration")
                    ->onDelete("set null");
            });
        }



        // Fix video_profiles foreign key
        if (Schema::hasTable("video_profiles")) {
            Schema::table("video_profiles", function (Blueprint $table) {
                try {
                    $table->dropForeign("video_profiles_user_id_foreign");
                } catch (\Exception $e) {}

                $table->foreign("user_id")
                    ->references("id")
                    ->on("registration")
                    ->onDelete("cascade");
            });
        }
    }

    public function down(): void
    {
        // Reversing is complex, keeping as-is
    }
};
