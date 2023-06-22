<x-app-layout>

<section class="flex flex-col md:flex-row h-auto ">
  <div class="bg-white w-full md:mx-auto md:full h-screen px-6 lg:px-16 flex">
    <div class="w-full h-100">
      <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Log in to your account</h1>
      <form class="mt-6" action="{{route('login')}}" method="POST">
        @csrf
        <div>
          <label class="block text-gray-700">Email Address</label>
          <input type="email" name="email" value="achraf@test.com" placeholder="Enter Email Address" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
        </div>

        <div class="mt-4">
          <label class="block text-gray-700">Password</label>
          <input type="password" name="password" value="12345678" placeholder="Enter Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                focus:bg-white focus:outline-none" required>
        </div>


        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
        <x-primary-button>
            {{ __('Log In') }}
        </x-primary-button>

        <p ><a href="{{ route('password.request') }}" class="text-blue-500 hover:text-blue-700 font-semibold"> Forget password?</a></p>
        <p >Need an account?  <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Create an account</a></p>

      </form>


    </div>
  </div>

</section>

</x-app-layout>
