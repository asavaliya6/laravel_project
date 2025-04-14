<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                @if(session('message'))
                    <div class="mb-4 text-green-600 dark:text-green-400">
                        {{ session('message') }}
                    </div>
                @endif

                <form action="{{ url('/create-user') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Name</label>
                        <input type="text" name="name" class="w-full mt-1 p-2 border rounded" placeholder="Name" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Email</label>
                        <input type="email" name="email" class="w-full mt-1 p-2 border rounded" placeholder="Email" required>
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Create User
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
