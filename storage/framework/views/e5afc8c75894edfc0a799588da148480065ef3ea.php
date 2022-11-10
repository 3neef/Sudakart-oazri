<div>
   <form wire:submit.prevent="addToWishList()" method="post">
      <button type="submit" style="border: none; background:transparent; padding:0; <?php echo e($style); ?> ">
         <i class="ti-heart" aria-hidden="true" style="<?php echo e($style); ?>"></i>
      </button>
   </form>
</div>
<?php /**PATH /var/www/html/sudakart/resources/views/livewire/add-to-wishlist.blade.php ENDPATH**/ ?>