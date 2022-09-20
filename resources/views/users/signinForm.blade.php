<x-layout>
    <x-card class="p-10 rounded max-w-xl mx-auto mt-24">
        <div class="mb-6 px-48">
            <a href="{{route('googlelogin')}}"><button type="submit" href="/login" class="text-white bg-laravel rounded py-2 px-4 hover:bg-black">Google Login
            </button></a>
          </div>
          <div class="px-40">
            <a  href="/register"><button type="submit" class="bg-laravel py-2 px-4 hover:bg-black rounded text-white">Create account
          </div>
      </div>
        </div>
    </x-card>
</x-layout>