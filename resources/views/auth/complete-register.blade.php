<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.complete.register.vendor') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Phone Number')" />

                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="first_name" :value="__('First Name')" />

                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="last_name" :value="__('Last Name')" />

                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="secondary_phone" :value="__('secondary_phone')" />

                <x-input id="secondary_phone" class="block mt-1 w-full" type="number" name="secondary_phone" :value="old('secondary_phone')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="bank_name" :value="__('bank_name')" />

                <x-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name" :value="old('bank_name')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="account_number" :value="__('account_number')" />

                <x-input id="account_number" class="block mt-1 w-full" type="text" name="account_number" :value="old('account_number')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="account_holder_name" :value="__('account_holder_name')" />

                <x-input id="account_holder_name" class="block mt-1 w-full" type="text" name="account_holder_name" :value="old('account_holder_name')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="branch" :value="__('branch')" />

                <x-input id="branch" class="block mt-1 w-full" type="text" name="branch" :value="old('branch')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="shop_name" :value="__('shop_name')" />

                <x-input id="shop_name" class="block mt-1 w-full" type="text" name="shop_name" :value="old('shop_name')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="shop_en_name" :value="__('shop_en_name')" />

                <x-input id="shop_en_name" class="block mt-1 w-full" type="text" name="shop_en_name" :value="old('shop_en_name')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="shop_address" :value="__('Shop Address')" />

                <x-input id="shop_address" class="block mt-1 w-full" type="text" name="shop_address" :value="old('shop_address')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4 w-full">
                <x-label for="shop_categories" :value="__('Shop Categories')" />

                <select class="js-example-basic-multiple block mt-1 w-full" name="shop_categories[][category_id]" multiple="multiple">
                    @foreach($categories as $id => $entry)
                    <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-button class="ml-4">
                    {{ __('Complete Registeration') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>