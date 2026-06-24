<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Create Company
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm">

                <div class="p-6 border-b border-gray-200">
                    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-5">
                            <label class="block mb-1 text-sm font-medium text-gray-700">
                                Company Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="w-full border-gray-300 border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') @enderror"
                                placeholder="e.g. Acme Corp">
                            @error('name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-5">
                            <label class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="company@email.com">
                            @error('email')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Logo --}}
                        <div class="mb-5">
                            <label class="block mb-1 text-sm font-medium text-gray-700">
                                Logo <span class="text-xs text-gray-400">(min 100×100px)</span>
                            </label>
                            <input type="file" name="logo" accept="image/*"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            @error('logo')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Website --}}
                        <div class="mb-6">
                            <label class="block mb-1 text-sm font-medium text-gray-700">Website</label>
                            <input type="url" name="website" value="{{ old('website') }}"
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="https://example.com">
                            @error('website')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Buttons --}}
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <a href="{{ route('companies.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                                ← Back to Companies
                            </a>
                            <button type="submit"
                                class="px-6 py-2 text-sm font-medium text-white transition bg-blue-600 rounded-md hover:bg-blue-700">
                                Create Company
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>