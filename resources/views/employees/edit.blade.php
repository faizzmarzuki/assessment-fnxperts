<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Employee</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow">
                <form action="{{ route('employees.update', $employee) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">First Name *</label>
                        <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}"
                            class="block w-full p-2 mt-1 border rounded-md">
                        @error('first_name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Last Name *</label>
                        <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}"
                            class="block w-full p-2 mt-1 border rounded-md">
                        @error('last_name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Company</label>
                        <select name="company_id" class="block w-full p-2 mt-1 border rounded-md">
                            <option value="">-- None --</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ old('company_id', $employee->company_id) == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $employee->email) }}"
                            class="block w-full p-2 mt-1 border rounded-md">
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}"
                            class="block w-full p-2 mt-1 border rounded-md">
                    </div>
                    <div class="flex justify-between">
                        <a href="{{ route('employees.index') }}" class="text-gray-600">Cancel</a>
                        <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>