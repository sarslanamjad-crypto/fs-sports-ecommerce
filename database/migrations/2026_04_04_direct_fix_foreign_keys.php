<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Direct SQL to drop and recreate foreign keys

        // Wishlists table
        DB::statement('ALTER TABLE wishlists DROP FOREIGN KEY wishlists_user_id_foreign');
        DB::statement('ALTER TABLE wishlists ADD CONSTRAINT wishlists_user_id_foreign FOREIGN KEY (user_id) REFERENCES registration(id) ON DELETE CASCADE');

        // Cart table
        if (Schema::hasTable('carts')) {
            try {
                DB::statement('ALTER TABLE carts DROP FOREIGN KEY carts_user_id_foreign');
            } catch (\Exception $e) {}
            DB::statement('ALTER TABLE carts ADD CONSTRAINT carts_user_id_foreign FOREIGN KEY (user_id) REFERENCES registration(id) ON DELETE CASCADE');
        }

        // Cart items table
        if (Schema::hasTable('cart_items')) {
            try {
                DB::statement('ALTER TABLE cart_items DROP FOREIGN KEY cart_items_user_id_foreign');
            } catch (\Exception $e) {}
            DB::statement('ALTER TABLE cart_items ADD CONSTRAINT cart_items_user_id_foreign FOREIGN KEY (user_id) REFERENCES registration(id) ON DELETE CASCADE');
        }

        // Orders transactions table
        if (Schema::hasTable('orders_transactions')) {
            try {
                DB::statement('ALTER TABLE orders_transactions DROP FOREIGN KEY orders_transactions_user_id_foreign');
            } catch (\Exception $e) {}
            DB::statement('ALTER TABLE orders_transactions ADD CONSTRAINT orders_transactions_user_id_foreign FOREIGN KEY (user_id) REFERENCES registration(id) ON DELETE CASCADE');
        }

        // Group purchases table
        if (Schema::hasTable('group_purchases')) {
            try {
                DB::statement('ALTER TABLE group_purchases DROP FOREIGN KEY group_purchases_group_lead_id_foreign');
            } catch (\Exception $e) {}
            DB::statement('ALTER TABLE group_purchases ADD CONSTRAINT group_purchases_group_lead_id_foreign FOREIGN KEY (group_lead_id) REFERENCES registration(id) ON DELETE CASCADE');
        }

        // Product reviews table
        if (Schema::hasTable('product_reviews')) {
            try {
                DB::statement('ALTER TABLE product_reviews DROP FOREIGN KEY product_reviews_user_id_foreign');
            } catch (\Exception $e) {}
            DB::statement('ALTER TABLE product_reviews ADD CONSTRAINT product_reviews_user_id_foreign FOREIGN KEY (user_id) REFERENCES registration(id) ON DELETE CASCADE');
        }

        // Audit trail table
        if (Schema::hasTable('audit_trail')) {
            try {
                DB::statement('ALTER TABLE audit_trail DROP FOREIGN KEY audit_trail_user_id_foreign');
            } catch (\Exception $e) {}
            DB::statement('ALTER TABLE audit_trail ADD CONSTRAINT audit_trail_user_id_foreign FOREIGN KEY (user_id) REFERENCES registration(id) ON DELETE SET NULL');
        }



        // Video profiles table
        if (Schema::hasTable('video_profiles')) {
            try {
                DB::statement('ALTER TABLE video_profiles DROP FOREIGN KEY video_profiles_user_id_foreign');
            } catch (\Exception $e) {}
            DB::statement('ALTER TABLE video_profiles ADD CONSTRAINT video_profiles_user_id_foreign FOREIGN KEY (user_id) REFERENCES registration(id) ON DELETE CASCADE');
        }
    }

    public function down(): void
    {
        // Reversing is complex, keeping as-is
    }
};
