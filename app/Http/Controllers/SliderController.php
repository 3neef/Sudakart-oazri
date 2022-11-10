<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSliderRequest;
use App\Models\Slider;
use App\Services\UploadImageServices;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        return Slider::with('product')->get();

    }


    public function store(CreateSliderRequest $request){
        $image = '';
        if ($request->file('image')) {
            $image = UploadImageServices::upload($request->file('image'), 'sliders');
        }

        $slider = Slider::Create([
            'product_id'          => $request->product_id,
            'image'         => $image,
        ]);

        if (! $request->expectsJson()) {
            return redirect()->route('admin.ads');
        }
        return $slider;
    }

    public function destroy(Request $request,Slider $slider)
    {
        $slider->delete();
        if (! $request->expectsJson()) {
            return redirect()->route('admin.ads');
        }
        return response(['message' => __('Slider has been deleted')]);
    }


}
