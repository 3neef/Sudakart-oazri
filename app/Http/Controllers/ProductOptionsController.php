<?php

namespace App\Http\Controllers;

use App\Models\ProductOption;

class ProductOptionsController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy(ProductOption $option)
    {
        $option->delete();
        return response(['message' => __('option has been deleted')]);
    }
}
