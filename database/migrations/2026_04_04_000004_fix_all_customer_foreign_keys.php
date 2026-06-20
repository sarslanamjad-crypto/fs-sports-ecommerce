<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $tables = [
            'wishlists',
            'carts',
            'cart_items',
            'orders_transactions',
            'group_purchases',
            'product_reviews',
            'audit_trail',
            'video_profiles'
        ];

        $userColumn = 'user_id';
        $groupLeadColumn = 'group_lead_id';

        foreach ($tables as $table) {
            // Determine which column to fix
            $column = ($table === 'group_purchases') ? $groupLeadColumn : $userColumn;

            if (!Schema::hasTable($table)) {
                continue;
            }

            // Check if foreign key already points to 'registration'
            $existingFk = collect(DB::select(
                "SELECT CONSTRAINT_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                WHERE TABLE_NAME = ? AND COLUMN_NAME = ? AND REFERENCED_TABLE_NAME = 'registration'",
                [$table, $column]
            ))->first();

            if ($existingFk) {
                // Foreign key already points to registration, skip
                continue;
            }

            // Drop any existing foreign keys pointing to 'customers'
            Schema::table($table, function (Blueprint $tableBlueprint) use ($column, $table) {
                $foreignKeys = collect(DB::select(
                    "SELECT CONSTRAINT_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                    WHERE TABLE_NAME = ? AND COLUMN_NAME = ? AND REFERENCED_TABLE_NAME = 'customers'",
                    [$table, $column]
                ))->pluck('CONSTRAINT_NAME')->toArray();

                foreach ($foreignKeys as $fk) {
                    try {
                        $tableBlueprint->dropForeign($fk);
                    } catch (\Exception $e) {
                        // Continue if not found
                    }
                }
            });

            // Add corrected foreign key
            Schema::table($table, function (Blueprint $tableBlueprint) use ($column, $table) {
                $deleteAction = ($table === 'audit_trail') ? 'set null' : 'cascade';

                try {
                    $tableBlueprint->foreign($column)
                        ->references('id')
                        ->on('registration')
                        ->onDelete($deleteAction);
                } catch (\Exception $e) {
                    // Foreign key already exists or other constraint, skip
                }
            });
        }
    }

    public function down(): void
    {
        // Note: Reversing this is complex, so keeping the forward migration
    }
};
