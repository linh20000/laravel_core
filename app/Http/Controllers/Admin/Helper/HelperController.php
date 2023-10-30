<?php

namespace App\Http\Controllers\Admin\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Constant\GeneralConstant;
use DB;

class HelperController extends Controller
{
    public function __construct ()
    {
        // code here
    }

    public function togglePublished ($table, $id, Request $request)
    {

        $column = $request->get('column') ? $request->get('column') : 'published';

        $value = $request->get('value') == GeneralConstant::PUBLISHED  ? GeneralConstant::UNPUBLISHED : GeneralConstant::PUBLISHED;



        if (empty($table) || empty($id) || empty($column)) {
           return response()->json([
               'status' => 404,
               'data' => [
                   'message' => 'Table ' . $table . ' id or ' . $id . ' is not found!'
               ]
           ]);
        }

        try {

            DB::table($table)->where('id', $id)->update([$column => $value]);

            $responseHtml = $value == GeneralConstant::PUBLISHED ? '<span class="btn btn-success">Active</span>' : '<span class="btn btn-danger">No Active</span>';

            return response()->json(['status' => 200, 'data' => ['responseHtml' => $responseHtml, 'table' => $table, 'column' => $column, 'value' => $value], 'id' => $id]);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage);
        }
    }
}

