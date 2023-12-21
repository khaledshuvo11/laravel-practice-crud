<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
            <!-- green-->
            <div class="flex justify-between py-4 px-8 my-3 bg-[#98f5e1]  text-[#236c5b]">
                <p class="font-sans">{{ $message }}</p>
                <button class="font-bold">&#10005;</button>
            </div>
            @endif
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
                                    <th class="border border-slate-300">Class-Name</th>
                                    <th class="border border-slate-300">Roll</th>
                                    <th class="border border-slate-300">Reg</th>
                                    <th class="border border-slate-300">Result</th>
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
                                    <td class="border border-slate-300">
                                        <img class="ml-5 pl-5" width="100px" src="{{ asset("storage/images/$student->image") }}" alt="">
                                    </td>
                                    <td class="border border-slate-300">{{ $student->class_name }}</td>
                                    <td class="border border-slate-300">{{ $student->roll_no }}</td>
                                    <td class="border border-slate-300">{{ $student->reg_no }}</td>
                                    <td class="border border-slate-300">{{ $student->result }}</td>
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
