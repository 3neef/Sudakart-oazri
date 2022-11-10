<div>
    <div class="container">

    
    <div class="row section-b-space">
        @foreach($comments as $comment)
        <div class="col-sm-12">
            @if($comments->count() > 0)
            <ul class="comment-section">
               
                
                <li>
                    <div class="media"><img src="{{ asset('main/images/profile/profile.jpg') }}" alt="Generic placeholder image">
                        <div class="media-body">
                            <h6>{{ $comment->user->userable->name }} <span>( {{date_format($comment->created_at,'D M Y')  }})</span></h6>
                            <p>{{ $comment->comment }}</p>
                        </div>
                    </div>
                </li>
             
           
            </ul>
            @else 
                No Comments
            @endif
        </div>
        @endforeach
    </div>
    <div class="row blog-contact">
        
        <div class="col-sm-12">
            @auth('web')
            <h3>Leave Your Comment</h3>
            <form wire:submit.prevent="comment()"  class="theme-form">
                <div class="form-row row">
                    <div class="col-md-12">
                        <label for="exampleFormControlTextarea1">{{ __('body.comment') }}</label>
                        <textarea wire:model.lazy="comment" class="form-control" placeholder="Write Your Comment"
                            id="exampleFormControlTextarea1" rows="6"></textarea>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-solid" type="submit">{{ __('body.Post_Comment') }}</button>
                    </div>
                </div>
            </form>
            @else
            <div>
                <div class="mb-8 text-center text-gray-600">
                  <h4 class="text-danger"> {{ __('msg.blog_comment') }}</h4>
                </div>
              
            </div>
            @endauth
        </div>
    </div>
    </div>
</div>
