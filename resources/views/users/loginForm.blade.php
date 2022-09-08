<x-layout>
    <x-card class="p-10 fixed-center rounded max-w-xl mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">LOGIN EXISTING ACCOUNT</h2>
          </header>
      
          <form method="POST" action="/user/authenticate">
            @csrf     
            <div class="mb-6">
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Email</label>
              <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />
      
              @error('email')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
      
            <div class="mb-6">
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                Password
              </label>
              <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                value="{{old('password')}}" />
      
              @error('password')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>

            <div class="mb-6">
              <label for="user_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">input user type</label>
              <input type="user_type" class="border border-gray-200 rounded p-2 w-full" name="user_type" value="{{old('user_type')}}" />

                 @error('user_type')
                 <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                 @enderror
            </div>
      
            <div class="mb-6">
              <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                LOGIN
              </button>
            </div>
          </form>
    </x-card>
</x-layout>