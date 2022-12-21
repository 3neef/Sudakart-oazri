<div>
   <div class="blog-detail-page">
    <div class="container">
        <div class="row section-b-space">
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-12">
                <?php if($comments->count() > 0): ?>
                <ul class="comment-section">
                   
                    
                    <li>
                        <div class="media"><img src="<?php echo e(asset('main/images/profile/profile.jpg')); ?>" alt="Generic placeholder image">
                            <div class="media-body">
                                <h6><?php if($comment->user): ?><?php echo e($comment->user->userable->name); ?> <?php else: ?> Anon  <?php endif; ?><span>( <?php echo e(date_format($comment->created_at,'D M Y')); ?>)</span></h6>
                                <div>
                                   <p><?php echo e($comment->comment); ?></p>
                                </div>
                            </div>
                        </div>
                    </li>
                 
               
                </ul>
                <?php else: ?> 
                    <?php echo e(__('body.product_comments_no_comments')); ?>

                <?php endif; ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
   </div>
    <?php if(auth()->guard('web')->check()): ?>
    <form wire:submit.prevent="rate()" class="theme-form">
        
        <div class="form-row row"> 
           

           
           
            
            <div class="col-md-12">
                <div class="form-group">
                    <select wire:model="rating"  name="rating" class="form-control">
                        <option value=""><?php echo e(__('body.Choose_Rating')); ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                    </select>
                </div>
                <label for="review"><?php echo e(__('body.comment')); ?></label>
                <textarea wire:model.lazy="comment" class="form-control" placeholder="<?php echo e(__('body.Wrire_Testimonial')); ?>"
                    id="exampleFormControlTextarea1" rows="6"></textarea>
            </div>
            <div class="col-md-12">
                <button class="btn btn-solid" type="submit"><?php echo e(__('body.Your_Review')); ?></button>
            </div>
        </div>
    </form>
    <?php else: ?> 
        <h3 class="text-danger"><?php echo e(__('msg.product_comment')); ?></h3>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/livewire/product-rating.blade.php ENDPATH**/ ?>