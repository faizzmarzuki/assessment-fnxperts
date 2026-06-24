<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Employees</h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow">
                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-medium">Employees list</h3>
                    <a href="{{ route('employees.create') }}" class="px-4 py-2 text-white bg-green-600 rounded">
                        Create new employee
                    </a>
                </div>
                @if(session('success'))
                    <div class="p-3 mb-4 text-green-800 bg-green-100 rounded">{{ session('success') }}</div>
                @endif
                <table class="w-full border-collapse">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-3 text-left border">First Name</th>
                            <th class="p-3 text-left border">Last Name</th>
                            <th class="p-3 text-left border">Company</th>
                            <th class="p-3 text-left border">Email</th>
                            <th class="p-3 text-left border">Phone</th>
                            <th class="p-3 text-left border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 border">{{ $employee->first_name }}</td>
                                <td class="p-3 border">{{ $employee->last_name }}</td>
                                <td class="p-3 border">{{ $employee->company->name ?? '-' }}</td>
                                <td class="p-3 border">{{ $employee->email }}</td>
                                <td class="p-3 border">{{ $employee->phone }}</td>
                                <td class="p-3 border">
                                    <a href="{{ route('employees.edit', $employee) }}" class="mr-2 text-blue-600">Edit</a>
                                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600"
                                            onclick="return confirm('Delete?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">{{ $employees->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>