<div>
   <div class="blog-detail-page">
    <div class="container">
        <div class="row section-b-space">
            @foreach($comments as $comment)
            <div class="col-sm-12">
                @if($comments->count() > 0)
                <ul class="comment-section">
                   
                    
                    <li>
                        <div class="media"><img src="{{ asset('main/images/profile/profile.jpg') }}" alt="Generic placeholder image">
                            <div class="media-body">
                                <h6>@if($comment->user){{ $comment->user->userable->name }} @else Anon  @endif<span>( {{date_format($comment->created_at,'D M Y')  }})</span></h6>
                                <div>
                                   <p>{{ $comment->comment }}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                 
               
                </ul>
                @else 
                    {{ __('body.product_comments_no_comments') }}
                @endif
            </div>
            @endforeach
        </div>
    </div>
   </div>
    @auth('web')
    <form wire:submit.prevent="rate()" class="theme-form">
        
        <div class="form-row row"> 
           

           
           
            
            <div class="col-md-12">
                <div class="form-group">
                    <select wire:model="rating"  name="rating" class="form-control">
                        <option value="">{{ __('body.Choose_Rating') }}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                    </select>
                </div>
                <label for="review">{{ __('body.comment') }}</label>
                <textarea wire:model.lazy="comment" class="form-control" placeholder="{{ __('body.Wrire_Testimonial') }}"
                    id="exampleFormControlTextarea1" rows="6"></textarea>
            </div>
            <div class="col-md-12">
                <button class="btn btn-solid" type="submit">{{ __('body.Your_Review') }}</button>
            </div>
        </div>
    </form>
    @else 
        <h3 class="text-danger">{{ __('msg.product_comment') }}</h3>
    @endauth
</div>
