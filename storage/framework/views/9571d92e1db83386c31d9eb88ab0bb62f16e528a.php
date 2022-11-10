
<?php $__env->startSection('content'); ?>

  <!-- breadcrumb start -->
  <div class="breadcrumb-section">
    <div class="container">
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2><?php echo e(__('body.blog')); ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home.web')); ?>"><?php echo e(__('body.home')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('body.blog')); ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


     <!-- section start -->
     <section class="section-b-space blog-page ratio2_3">
        <div class="container">
            <div class="row">
                <!--Blog sidebar start-->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="blog-sidebar">
                        <div class="theme-card">
                            <h4><?php echo e(__('body.popular_blog')); ?></h4>
                            <ul class="popular-blog">
                                <?php $__empty_1 = true; $__currentLoopData = $pubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li>
                                    <div class="media">
                                       

                                        
                                        <div class="blog-date">
                                            <a href="<?php echo e(route('blog.show',$pub->id)); ?>">
                                                <span><?php echo e(date_format ($pub->created_at,'d')); ?> </span><span>
                                                <?php echo e(date_format($pub->created_at,'M')); ?></span>
                                            </a>
                                        </div>
                                        <div class="media-body align-self-center">
                                          <a href="<?php echo e(route('blog.show',$pub->id)); ?>">
                                            <h6><?php echo e($pub->title); ?></h6>
                                            <p><?php echo e($pub->views); ?>  <?php echo e(__('body.hits')); ?></p>
                                          </a>
                                        </div>
                                        
                                    </div>
                                    
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Blog sidebar start-->
                <!--Blog List start-->
                <div class="col-xl-9 col-lg-8 col-md-7 order-sec">
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row blog-media">
                        <div class="col-xl-6">
                            <div class="blog-left">
                                <a href="<?php echo e(route('blog.show',$article->id)); ?>"><img src="<?php echo e(asset('main/images/new_logo.png')); ?>"
                                        class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="blog-right">
                                <div>
                                   
                                    <a href="<?php echo e(route('blog.show',$article->id)); ?>">
                                        <h4><?php echo e($article->title); ?></h4>
                                    </a>
                                    <ul class="post-social">
                                        <li>
                                            <div style="display:flex; flex-direction:column;">
                                                <span> <?php echo e(__('body.Posted_By')); ?> : <?php if($article->shop): ?> <?php echo e($article->shop->shop_name); ?><?php endif; ?></span>
                                                <span><?php echo e(date_format ($article->created_at,'F Y d')); ?></span>
                                            </div>
                                        </li>
                                        <li><i class="fa fa-heart"></i> <?php echo e($article->views); ?> <?php echo e(__('body.hits')); ?></li>
                                        <li><i class="fa fa-comments"></i> <?php echo e($article->comments->count()); ?> <?php echo e(__('body.comment')); ?></li>
                                    </ul>
                                    
                                    <p><?php echo e($article->content); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                  
                </div>
                <!--Blog List start-->
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('main/layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/sudakart/resources/views/main/blog/index.blade.php ENDPATH**/ ?>