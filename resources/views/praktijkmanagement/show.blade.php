<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto">
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h3 class="text-lg font-semibold mb-6">{{ __('Gebruikersdetails') }}</h3>

                            <div class="space-y-4">
                                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Naam</label>
                                        <p class="mt-1 text-sm text-gray-900 font-semibold">{{ $user->name ?? '-' }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Email</label>
                                        <p class="mt-1 text-sm text-gray-900 font-semibold">{{ $user->email ?? '-' }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Gebruikersrol</label>
                                        <p class="mt-1 text-sm text-gray-900 font-semibold">{{ $user->rolename ?? '-' }}</p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">ID</label>
                                        <p class="mt-1 text-sm text-gray-900 font-semibold">{{ $user->id ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8 flex gap-4">
                                <a href="{{ route('praktijkmanagement.edit', $user->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                                    Wijzig
                                </a>
                                <a href="{{ route('praktijkmanagement.userroles') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                    Terug
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
