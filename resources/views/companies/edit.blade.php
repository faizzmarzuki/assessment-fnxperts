<x-app-layout>
    <x-slot name="header">
        <x-page-heading>Edit Company</x-page-heading>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="mb-5">
                        <x-input-label for="name">Company Name <span class="text-red-500">*</span></x-input-label>
                        <x-text-input id="name" type="text" name="name" :value="old('name', $company->name)" placeholder="e.g. Acme Corp" />
                        <x-input-error :messages="$errors->get('name')" />
                    </div>

                    {{-- Email --}}
                    <div class="mb-5">
                        <x-input-label for="email">Email</x-input-label>
                        <x-text-input id="email" type="email" name="email" :value="old('email', $company->email)" placeholder="company@email.com" />
                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    {{-- Logo --}}
                    <div class="mb-5">
                        <x-input-label for="logo">
                            Logo <span class="text-xs font-normal text-gray-400">(min 100×100px)</span>
                        </x-input-label>
                        @if($company->logo)
                            <div class="mb-2">
                                <img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }} logo"
                                    class="object-cover w-16 h-16 border rounded">
                                <p class="mt-1 text-xs text-gray-400">Current logo — upload a new one to replace it</p>
                            </div>
                        @endif
                        <input id="logo" type="file" name="logo" accept="image/*"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <x-input-error :messages="$errors->get('logo')" />
                    </div>

                    {{-- Website --}}
                    <div class="mb-6">
                        <x-input-label for="website">Website</x-input-label>
                        <x-text-input id="website" type="url" name="website" :value="old('website', $company->website)" placeholder="https://example.com" />
                        <x-input-error :messages="$errors->get('website')" />
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <a href="{{ route('companies.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                            ← Back to Companies
                        </a>
                        <x-primary-button>Update Company</x-primary-button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>
