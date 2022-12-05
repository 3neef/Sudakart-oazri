<!-- footer start -->
<footer class="footer-light">
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4 class="font-weight-bold text-dark">
                            <?php echo e(__('footer.oazri_online_store')); ?>

                        </h4>
                    </div>
                    <div class="footer-contant">
                        <p>
                            <?php echo e(__('footer.about_oazari')); ?>

                        </p>
                        <div class="d-flex">
                            <a href="">
                                <img src="<?php echo e(asset('main/images/mobile/google-play-badge.svg')); ?>" height="60" width="100%" class="mx-2" alt="">
                            </a>
                            <a href="">
                                <img src="<?php echo e(asset('main/images/mobile/download-on-the-app-store-badge.png')); ?>" height="60" width="100%" class="mx-2" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col offset-xl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4><?php echo e(__('footer.my_account')); ?></h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="<?php echo e(route('profile.index')); ?>"><?php echo e(__('footer.profile_page')); ?></a></li>
                                <li><a href="<?php echo e(route('profile.order.refunds')); ?>"><?php echo e(__('footer.returned_products')); ?></a></li>
                                <li><a href="<?php echo e(route('profile.myOrder')); ?>"><?php echo e(__('footer.order_history')); ?></a></li>
                                <li><a href="<?php echo e(route('notification.index')); ?>"><?php echo e(__('footer.notifications')); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4><?php echo e(__('footer.informations')); ?></h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="<?php echo e(route('about')); ?>"><?php echo e(__('footer.about_us')); ?></a></li>
                                <li><a href="#"><?php echo e(__('footer.contact_us')); ?></a></li>
                                <li><a href="<?php echo e(route('policies')); ?>"><?php echo e(__('footer.policies')); ?></a></li>
                                <li><a href="<?php echo e(route('return-policy')); ?>"><?php echo e(__('footer.return_policies')); ?></a></li>
                                <li><a href="<?php echo e(route('register')); ?>"><?php echo e(__('body.create_vendor')); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-social">
                        <ul>
                            <li>
                            <a href="https://www.facebook.com/109876340618381" target="_blank">
                                <i class="fa fa-facebook default-color" aria-hidden="true"></i>
                            </a>
                            </li>
                            <li>
                                <a href="https://oazri.com/">
                                    <i class="fa fa-globe default-color" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter default-color" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/oazri1" target="_blank">
                                    <i class="fa fa-instagram default-color" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <p class="small mt-4">
                        Powered with <i class="fa fa-heart-o text-danger" aria-hidden="true"></i>  by Oazri 2021
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i>
                            OAZRI | All Rights Reserved. Design & Development by <a href="http://flixtechnology.com" target="__blanck">Flix Technology</a>
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="payment-card-bottom">
                        <ul>
                            <li><img src="<?php echo e(asset('main/images/payment_methods/visa-circle.png')); ?>" width="50"
                                 alt="Visa"></li>
                            <li><img src="<?php echo e(asset('main/images/payment_methods/mastercard-circle.png')); ?>" width="50" alt=""></li>
                            <li><img src="<?php echo e(asset('main/images/payment_methods/cod.png')); ?>" width="50" alt=""></li>
                            <li><img src="<?php echo e(asset('main/images/payment_methods/bankTransfer.png')); ?>" width="50" alt=""></li>
                            <li><img src="<?php echo e(asset('main/images/payment_methods/delivery.png')); ?>" width="50" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->


<!-- tap to top -->
<div class="tap-top">
    <div>
        <i class="fa fa-angle-double-up"></i>
    </div>
</div>
<!-- tap to top End -->





<!-- search-overlay -->
 <div id="search-overlay" class="search-overlay">
    <div>
        <span class="closebtn" onclick="closeSearch()"
            title="Close Overlay">×</span>
        <div class="overlay-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <form action="<?php echo e(route('general.search')); ?>" method="get">
                            <div class="form-group">
                                <input type="search" name="q" class="form-control"
                                    id="exampleInputPassword1"
                                    placeholder="Search a Product">
                            </div>
                            <button type="submit" class="btn btn-primary"><i
                                    class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- theme setting --><?php /**PATH C:\Users\10\Desktop\mazin projects\sudakart-latest-2023\resources\views/main/partials/footer.blade.php ENDPATH**/ ?>