<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                {{ __("You're logged in!") }}

                <!-- زر تسجيل الخروج -->
                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" 
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent 
                               rounded-md font-semibold text-xs text-white uppercase tracking-widest 
                               hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 
                               transition ease-in-out duration-150">
                        تسجيل الخروج
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
