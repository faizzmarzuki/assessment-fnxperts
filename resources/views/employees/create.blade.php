<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Create Employee</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">First Name *</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                            class="mt-1 block w-full border rounded-md p-2">
                        @error('first_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Last Name *</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                            class="mt-1 block w-full border rounded-md p-2">
                        @error('last_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Company</label>
                        <select name="company_id" class="mt-1 block w-full border rounded-md p-2">
                            <option value="">-- None --</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="mt-1 block w-full border rounded-md p-2">
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                            class="mt-1 block w-full border rounded-md p-2">
                    </div>
                    <div class="flex justify-between">
                        <a href="{{ route('employees.index') }}" class="text-gray-600">Cancel</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>