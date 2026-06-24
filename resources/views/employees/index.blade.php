<x-app-layout>
    <x-slot name="header">
        <x-page-heading>Employees</x-page-heading>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-card>
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-base font-medium text-gray-700">All Employees</h3>
                    <a href="{{ route('employees.create') }}"
                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        + New Employee
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="p-3 text-sm font-semibold text-left text-gray-600 border border-gray-200">First Name</th>
                                <th class="p-3 text-sm font-semibold text-left text-gray-600 border border-gray-200">Last Name</th>
                                <th class="p-3 text-sm font-semibold text-left text-gray-600 border border-gray-200">Company</th>
                                <th class="p-3 text-sm font-semibold text-left text-gray-600 border border-gray-200">Email</th>
                                <th class="p-3 text-sm font-semibold text-left text-gray-600 border border-gray-200">Phone</th>
                                <th class="p-3 text-sm font-semibold text-left text-gray-600 border border-gray-200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $employee)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3 text-sm text-gray-700 border border-gray-200">{{ $employee->first_name }}</td>
                                    <td class="p-3 text-sm text-gray-700 border border-gray-200">{{ $employee->last_name }}</td>
                                    <td class="p-3 text-sm text-gray-700 border border-gray-200">{{ $employee->company->name ?? '—' }}</td>
                                    <td class="p-3 text-sm text-gray-700 border border-gray-200">{{ $employee->email ?: '—' }}</td>
                                    <td class="p-3 text-sm text-gray-700 border border-gray-200">{{ $employee->phone ?: '—' }}</td>
                                    <td class="p-3 text-sm border border-gray-200 whitespace-nowrap">
                                        <a href="{{ route('employees.edit', $employee) }}" class="font-medium text-blue-600 hover:text-blue-800">Edit</a>
                                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline ml-2"
                                            onsubmit="return confirm('Delete this employee?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:text-red-800">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-6 text-sm text-center text-gray-500 border border-gray-200">
                                        No employees yet. Create your first one.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">{{ $employees->links() }}</div>
            </x-card>
        </div>
    </div>
</x-app-layout>
