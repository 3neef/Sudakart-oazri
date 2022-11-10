<div>
    <div class="container">

    
    <div class="row section-b-space">
        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-12">
            <?php if($comments->count() > 0): ?>
            <ul class="comment-section">
               
                
                <li>
                    <div class="media"><img src="<?php echo e(asset('main/images/profile/profile.jpg')); ?>" alt="Generic placeholder image">
                        <div class="media-body">
                            <h6><?php echo e($comment->user->userable->name); ?> <span>( <?php echo e(date_format($comment->created_at,'D M Y')); ?>)</span></h6>
                            <p><?php echo e($comment->comment); ?></p>
                        </div>
                    </div>
                </li>
             
           
            </ul>
            <?php else: ?> 
                No Comments
            <?php endif; ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row blog-contact">
        
        <div class="col-sm-12">
            <?php if(auth()->guard('web')->check()): ?>
            <h3>Leave Your Comment</h3>
            <form wire:submit.prevent="comment()"  class="theme-form">
                <div class="form-row row">
                    <div class="col-md-12">
                        <label for="exampleFormControlTextarea1"><?php echo e(__('body.comment')); ?></label>
                        <textarea wire:model.lazy="comment" class="form-control" placeholder="Write Your Comment"
                            id="exampleFormControlTextarea1" rows="6"></textarea>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-solid" type="submit"><?php echo e(__('body.Post_Comment')); ?></button>
                    </div>
                </div>
            </form>
            <?php else: ?>
            <div>
                <div class="mb-8 text-center text-gray-600">
                  <h4 class="text-danger"> <?php echo e(__('msg.blog_comment')); ?></h4>
                </div>
              
            </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
</div>
<?php /**PATH /var/www/html/sudakart/resources/views/livewire/article-comments.blade.php ENDPATH**/ ?>