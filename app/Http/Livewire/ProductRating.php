<?php

namespace App\Http\Livewire;

use App\Models\Rate;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductRating extends Component
{
    public $rating;
    public $comment;
    public $currentId;
    public $product;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];

    protected $listeners = ['product-comment-added' => 'render'];

    public function render()
    {
        $comments = Rate::where('product_id', $this->product->id)->get();
        return view('livewire.product-rating')->with('comments',$comments);
    }

    

    public function rate()
    {
       
        $this->validate();
        
        
        $rating = new Rate;
        $rating->customer_id = Auth::guard('web')->user()->userable->id;
        $rating->product_id = $this->product->id;
        $rating->rate = $this->rating;
        $rating->comment = $this->comment;
        try {
            $rating->save();
            $this->reset('rating');
            $this->reset('comment');
            $this->emit('product-comment-added');
        } catch (\Throwable $th) {
            throw $th;
        }


            
        
    }


}
