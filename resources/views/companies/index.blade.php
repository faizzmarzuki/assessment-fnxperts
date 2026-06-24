<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Companies</h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow">
                <div class="flex justify-between mb-4">
                    <a href="{{ route('companies.create') }}" class="px-4 py-2 text-white bg-green-600 rounded">
                        Create new company
                    </a>
                </div>
                @if(session('success'))
                    <div class="p-3 mb-4 text-green-800 bg-green-100 rounded">{{ session('success') }}</div>
                @endif
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="p-3 text-left border">Name</th>
                            <th class="p-3 text-left border">Email</th>
                            <th class="p-3 text-left border">Logo</th>
                            <th class="p-3 text-left border">Website</th>
                            <th class="p-3 text-left border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td class="p-3 border">{{ $company->name }}</td>
                                <td class="p-3 border">{{ $company->email }}</td>
                                <td class="p-3 border">
                                    @if($company->logo)
                                        <img src="{{ Storage::url($company->logo) }}" class="object-cover w-10 h-10">
                                    @endif
                                </td>
                                <td class="p-3 border">{{ $company->website }}</td>
                                <td class="p-3 border">
                                    <a href="{{ route('companies.edit', $company) }}" class="mr-2 text-blue-600">Edit</a>
                                    <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600"
                                            onclick="return confirm('Delete?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">{{ $companies->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>