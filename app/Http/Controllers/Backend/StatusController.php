<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StatusController extends Controller
{
    public function toggle(Request $request, $modelName, $id)
    {
        $studlyModel = Str::studly(Str::singular($modelName));
        $classNames = [
            "App\\Models\\{$studlyModel}",
        ];

        // Specific mappings if needed
        if ($studlyModel === 'Team') {
            $classNames[] = "App\\Models\\TeamMember";
        }

        $modelClass = null;
        foreach ($classNames as $class) {
            if (class_exists($class)) {
                $modelClass = $class;
                break;
            }
        }

        if (!$modelClass) {
            return response()->json(['success' => false, 'error' => "Model {$modelName} not found"], 404);
        }

        $record = $modelClass::find($id);
        if (!$record) {
            return response()->json(['success' => false, 'error' => "Record not found"], 404);
        }

        $allowedColumns = ['status', 'is_active', 'is_activated', 'activated', 'is_in_house_brand'];
        $columnParam = $request->query('column');
        $foundColumn = null;

        if ($columnParam && in_array($columnParam, $allowedColumns) && \Illuminate\Support\Facades\Schema::hasColumn($record->getTable(), $columnParam)) {
            $foundColumn = $columnParam;
        } else {
            foreach ($allowedColumns as $column) {
                if (\Illuminate\Support\Facades\Schema::hasColumn($record->getTable(), $column)) {
                    $foundColumn = $column;
                    break;
                }
            }
        }

        if (!$foundColumn) {
            return response()->json(['success' => false, 'error' => "No status column found for model {$modelName}"], 404);
        }

        $currentStatus = $record->$foundColumn;
        
        if (is_numeric($currentStatus) || is_bool($currentStatus)) {
            $record->$foundColumn = $currentStatus ? 0 : 1;
        } else {
            $record->$foundColumn = ($currentStatus === 'active') ? 'inactive' : 'active';
        }

        $record->save();

        return response()->json([
            'success' => true,
            'model' => $modelName,
            'id' => $id,
            'status' => $record->$foundColumn
        ]);
    }
}
