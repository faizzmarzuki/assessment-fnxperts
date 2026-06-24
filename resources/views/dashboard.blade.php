<x-app-layout>
    <x-slot name="header">
        <x-page-heading>{{ __('Dashboard') }}</x-page-heading>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-card>
                <p class="text-sm text-gray-700">{{ __("You're logged in!") }}</p>

                <div class="grid grid-cols-1 gap-4 mt-6 sm:grid-cols-2">
                    <a href="{{ route('companies.index') }}"
                        class="flex items-center justify-between p-4 transition border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50">
                        <span class="text-sm font-medium text-gray-800">Manage Companies</span>
                        <span class="text-blue-600">→</span>
                    </a>
                    <a href="{{ route('employees.index') }}"
                        class="flex items-center justify-between p-4 transition border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50">
                        <span class="text-sm font-medium text-gray-800">Manage Employees</span>
                        <span class="text-blue-600">→</span>
                    </a>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
