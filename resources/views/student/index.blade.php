<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="table-responsive">
                        <a class="float-right bg-black text-white rounded-md hover:bg-sky-400 mb-3 px-2 py-1" href="{{ route('students.create') }}">
                            Add student
                        </a>
                        <table class="table table-striped w-full border-collapse border border-slate-400">
                            <thead>
                                <tr>
                                    <th class="border border-slate-300">#</th>
                                    <th class="border border-slate-300">Name</th>
                                    <th class="border border-slate-300">E-mail</th>
                                    <th class="border border-slate-300">Date-Of-Birth</th>
                                    <th class="border border-slate-300">Gender</th>
                                    <th class="border border-slate-300">Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr class="text-center">
                                    <td class="border border-slate-300">{{ $loop->iteration }}</td>
                                    <td class="border border-slate-300">{{ $student->name }}</td>
                                    <td class="border border-slate-300">{{ $student->email }}</td>
                                    <td class="border border-slate-300">{{ date('Y-m-d', strtotime($student->date_of_birth)) }}</td>
                                    <td class="border border-slate-300">{{ $student->gender }}</td>
                                    <td>
                                        <img width="50px" src="{{ asset('storage/image') }}" alt="">
                                    </td>
                                    <td class="border border-slate-300">
                                        <a href="{{ route('students.edit', $student->id) }}">Edit</a> |
                                        <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="cursor-pointer" value="Delete">
                                        </form>
                                    </td>
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
