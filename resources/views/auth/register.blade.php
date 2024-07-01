<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <h3 class="text-[#070044] text-lg font-semibold mt-4">Champ obligatoire <span class="text-[#E63946]">*</span>
        </h3>
        <!-- First Name -->
        <div class="flex items-center">
            <x-input-label for="firstname" :value="__('Nom')" class="text-[#070044] mr-2" />
            <span class="text-[#E63946]">*</span>
        </div>
        <div class="mt-2">
            <x-text-input id="firstname" class="block w-full border border-[#2EC7E6] focus:ring focus:ring-[#2EC7E6]" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2 text-[#E63946]" />
        </div>


        <div class="flex items-center">
            <x-input-label for="lastname" :value="__('Prénom')" class="text-[#070044] mr-2" />
            <span class="text-[#E63946]">*</span>
        </div>
        <div class="mt-2">
            <x-text-input id="lastname" class="block w-full border border-[#2EC7E6] focus:ring focus:ring-[#2EC7E6]" type="text" name="lastname" :value="old('lastname')" required autocomplete="lastname" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2 text-[#E63946]" />
        </div>


        <!-- Pseudonym -->
        <div class="mt-4">
            <x-input-label for="pseudonym" :value="__('Pseudo')" class="text-[#070044]" />
            <x-text-input id="pseudonym" class="block mt-1 w-full border border-[#2EC7E6] focus:ring focus:ring-[#2EC7E6]" type="text" name="pseudonym" :value="old('pseudonym')" required autocomplete="pseudonym" />
            <x-input-error :messages="$errors->get('pseudonym')" class="mt-2 text-[#E63946]" />
        </div>

        <!-- Email -->
        <div class="flex items-center">
            <x-input-label for="email" :value="__('Email')" class="text-[#070044] mr-2" />
            <span class="text-[#E63946]">*</span>
        </div>
        <div class="mt-2">
            <x-text-input id="email" class="block w-full border border-[#2EC7E6] focus:ring focus:ring-[#2EC7E6]" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-[#E63946]" />
        </div>


        <!-- Address -->
        <div class="flex items-center">
            <x-input-label for="address" :value="__('Address')" class="text-[#070044] mr-2" />
            <span class="text-[#E63946]">*</span>
        </div>
        <div class="mt-2">
            <x-text-input id="address" class="block w-full border border-[#2EC7E6] focus:ring focus:ring-[#2EC7E6]" type="text" name="address" :value="old('address')" required autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2 text-[#E63946]" />
        </div>


        <!-- Zip Code -->
        <div class="flex items-center">
            <x-input-label for="zipcode" :value="__('Code postal')" class="text-[#070044] mr-2" />
            <span class="text-[#E63946]">*</span>
        </div>
        <div class="mt-2">
            <x-text-input id="zipcode" class="block w-full border border-[#2EC7E6] focus:ring focus:ring-[#2EC7E6]" type="text" name="zipcode" :value="old('zipcode')" required autocomplete="zipcode" />
            <x-input-error :messages="$errors->get('zipcode')" class="mt-2 text-[#E63946]" />
        </div>


        <!-- Town -->
        <div class="flex items-center">
            <x-input-label for="town" :value="__('Ville')" class="text-[#070044] mr-2" />
            <span class="text-[#E63946]">*</span>
        </div>
        <div class="mt-2">
            <x-text-input id="town" class="block w-full border border-[#2EC7E6] focus:ring focus:ring-[#2EC7E6]" type="text" name="town" :value="old('town')" required autocomplete="town" />
            <x-input-error :messages="$errors->get('town')" class="mt-2 text-[#E63946]" />
        </div>


        <!-- Picture -->
        <div class="mt-4">
            <x-input-label for="picture" :value="__('Photo de profil')" class="text-[#070044]" />
            <x-text-input id="picture" class="block mt-1 w-full border border-[#2EC7E6] focus:ring focus:ring-[#2EC7E6]" type="file" name="picture" :value="old('picture')" required autocomplete="picture" />
            <x-input-error :messages="$errors->get('picture')" class="mt-2 text-[#E63946]" />
        </div>

        <!-- Birthday -->
        <div class="flex items-center">
            <x-input-label for="birthday" :value="__('Date de naissance')" class="text-[#070044] mr-2" />
            <span class="text-[#E63946]">*</span>
        </div>
        <div class="mt-2">
            <x-text-input id="birthday" class="block w-full border border-[#2EC7E6] focus:ring focus:ring-[#2EC7E6]" type="date" name="birthday" :value="old('birthday')" required autocomplete="birthday" />
            <x-input-error :messages="$errors->get('birthday')" class="mt-2 text-[#E63946]" />
        </div>


        <!-- Password -->
        <div class="flex items-center">
            <x-input-label for="password" :value="__('Mot de passe')" class="text-[#070044] mr-2" />
            <span class="text-[#E63946]">*</span>
        </div>
        <div class="mt-2">
            <x-text-input id="password" class="block w-full border border-[#2EC7E6] focus:ring focus:ring-[#2EC7E6]" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-[#E63946]" />
        </div>


        <!-- Confirm Password -->
        <div class="flex items-center">
            <x-input-label for="password_confirmation" :value="__('Confirm Mot de passe')" class="text-[#070044] mr-2" />
            <span class="text-[#E63946]">*</span>
        </div>
        <div class="mt-2">
            <x-text-input id="password_confirmation" class="block w-full border border-[#2EC7E6] focus:ring focus:ring-[#2EC7E6]" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-[#E63946]" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2EC7E6] dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Déjà enregistre ?') }}
            </a>

            <x-primary-button class="ms-4 bg-[#070044] text-white hover:bg-[#2EC7E6]">
                {{ __("S'enregistrer") }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>