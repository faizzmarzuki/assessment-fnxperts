<x-app-layout>
    <x-slot name="header">
        <x-page-heading>Edit Employee</x-page-heading>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <form action="{{ route('employees.update', $employee) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- First Name --}}
                    <div class="mb-5">
                        <x-input-label for="first_name">First Name <span class="text-red-500">*</span></x-input-label>
                        <x-text-input id="first_name" type="text" name="first_name" :value="old('first_name', $employee->first_name)" placeholder="Jane" />
                        <x-input-error :messages="$errors->get('first_name')" />
                    </div>

                    {{-- Last Name --}}
                    <div class="mb-5">
                        <x-input-label for="last_name">Last Name <span class="text-red-500">*</span></x-input-label>
                        <x-text-input id="last_name" type="text" name="last_name" :value="old('last_name', $employee->last_name)" placeholder="Doe" />
                        <x-input-error :messages="$errors->get('last_name')" />
                    </div>

                    {{-- Company --}}
                    <div class="mb-5">
                        <x-input-label for="company_id">Company</x-input-label>
                        <x-select id="company_id" name="company_id">
                            <option value="">— None —</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" @selected(old('company_id', $employee->company_id) == $company->id)>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input-error :messages="$errors->get('company_id')" />
                    </div>

                    {{-- Email --}}
                    <div class="mb-5">
                        <x-input-label for="email">Email</x-input-label>
                        <x-text-input id="email" type="email" name="email" :value="old('email', $employee->email)" placeholder="jane@email.com" />
                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    {{-- Phone --}}
                    <div class="mb-6">
                        <x-input-label for="phone">Phone</x-input-label>
                        <x-text-input id="phone" type="text" name="phone" :value="old('phone', $employee->phone)" placeholder="+60 12-345 6789" />
                        <x-input-error :messages="$errors->get('phone')" />
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <a href="{{ route('employees.index') }}" class="text-sm text-gray-500 hover:text-gray-700">
                            ← Back to Employees
                        </a>
                        <x-primary-button>Update Employee</x-primary-button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>
