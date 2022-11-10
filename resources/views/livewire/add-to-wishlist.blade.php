<div>
   <form wire:submit.prevent="addToWishList()" method="post">
      <button type="submit" style="border: none; background:transparent; padding:0; {{ $style }} ">
         <i class="ti-heart" aria-hidden="true" style="{{ $style }}"></i>
      </button>
   </form>
</div>
