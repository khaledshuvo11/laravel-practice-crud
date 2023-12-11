<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="table-responsive">
                        <table class="table table-striped w-full border-collapse border border-slate-400">
                            <thead>
                                <tr>
                                    <th class="border border-slate-300">#</th>
                                    <th class="border border-slate-300">Name</th>
                                    <th class="border border-slate-300">E-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="text-center">
                                    <td class="border border-slate-300">{{ $loop->iteration }}</td>
                                    <td class="border border-slate-300">{{ $user->name }}</td>
                                    <td class="border border-slate-300">{{ $user->email }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
