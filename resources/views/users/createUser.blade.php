<x-layout>
    <x-card class="p-10 fixed-center rounded max-w-xl mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
            <p class="mb-4">Create an account</p>
          </header>
      
          <form method="POST" action="/store_user">
            @csrf
            <div class="mb-6">
              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"> Name </label>
              <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}" />
      
              @error('name')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
      
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
              <label for="password2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                Confirm Password
              </label>
              <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
                value="{{old('password_confirmation')}}" />
      
              @error('password_confirmation')
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
                Sign Up
              </button>
            </div>
          </form>
    </x-card>
</x-layout>