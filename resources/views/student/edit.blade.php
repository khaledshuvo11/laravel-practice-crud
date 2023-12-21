<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <div class="bg-white">
                            <a class=" bg-black text-white rounded-md hover:bg-sky-400 px-4 py-2" href="{{ route('students.index') }}">
                                << Go to home page
                            </a>
                            <form action="{{ route('students.update', $student->id) }}" method="post" enctype="multipart/form-data">
                             @csrf
                             @method('put')
                                <div class="grid grid-cols-2 gap-5">
                                    <div>
                                        <label for="name" class="block mt-2">Name</label>
                                        <input
                                        type="text" 
                                        id="name"
                                        name="name"
                                        placeholder="Name."
                                        value="{{ old('name') ?? $student->name }}"
                                        class="border border-gray-500 px-4 py-2 focus:outline-none focus:border-purple-500 w-full">
                                        @error('name')
                                            <span class="text-red-700">{{$message}}</span>
                                        @enderror
                                    </div>
                     
                                    <div>
                                        <label for="email" class="block mt-2">Email</label>
                                        <input
                                        type="text"
                                        id="email" 
                                        name="email" 
                                        placeholder="Email."
                                        value="{{ old('email') ?? $student->email }}"
                                        class="border border-gray-500 px-4 py-2 focus:outline-none focus:border-purple-500 w-full">
                                        @error('email')
                                            <span class="text-red-700">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="date" class="block">Date_of_birth</label>
                                        <input
                                        type="date"
                                        id="date" 
                                        name="date_of_birth"
                                        value="{{ old('name') ?? $student->date_of_birth }}"
                                        class="border border-gray-500 px-4 py-2 focus:outline-none focus:border-purple-500 w-full"
                                        >
                                        @error('date_of_birth')
                                            <span class="text-red-700">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="gender" class="block mt-2 font-bold text-gray-600">Gender</label>
                                        <input
                                        type="radio"
                                        id="male" 
                                        name="gender"
                                        value="male" 
                                        class="py-1"
                                        @if ( old('gender') == 'male') checked @elseif( $student->gender === 'male') checked @endif
                                        >
                                        <label for="male">Male</label>
                                
                                        <input
                                        type="radio"
                                        id="female" 
                                        name="gender" 
                                        value="female"
                                        @if( $student->gender === 'female') @endif
                                        >
                                        <label for="female">Female</label>

                                        <input
                                        type="radio"
                                        id="others" 
                                        name="gender" 
                                        value="others"
                                        @if( $student->gender === 'others') @endif
                                        >
                                        <label for="others">Others</label>
                                    </div>

                                    <div>
                                        <label for="image" class="block">Image</label>
                                        <input
                                        type="file"
                                        id="image" 
                                        name="image" 
                                        class="py-2 focus:outline-none focus:border-purple-500">
                                        @error('image')
                                            <span class="text-red-700">{{$message}}</span>
                                        @enderror
                                        <div>
                                            <img width="100px" src="{{ asset("storage/images/$student->image") }}" alt="">
                                        </div>
                                    </div>

                                    <div>
                                        <label for="class_name" class="block">Class-name</label>
                                        <select name="class_name" id="class_name" class="w-full capitalize">
                                            @foreach ($initialData['clses'] as $cls)
                                            <option value="{{ $cls }}">{{ $cls }}</option>
                                            @endforeach
                                        </select>
                                        @error('class_name')
                                            <span class="text-red-700">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="roll_no" class="block">Roll:</label>
                                        <input type="text" id="roll_no" name="roll_no" class="w-full" value="{{ $student->roll_no }}">
                                        @error('roll_no')
                                            <span class="text-red-700">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="reg_no" class="block">Reg:</label>
                                        <input type="text" id="reg_no" name="reg_no" class="w-full" value="{{ $student->reg_no }}">
                                        @error('reg_no')
                                            <span class="text-red-700">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="result" class="block">Result</label>
                                        <select name="result" id="result" class="w-full">
                                            @foreach ($initialData['results'] as $result)
                                                <option value="{{ $result }}">{{ $result }}</option>
                                            @endforeach
                                        </select>
                                        @error('result')
                                            <span class="text-red-700">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div>                             
                                <button class="block w-full bg-yellow-400 mt-3 hover:bg-yellow-300 p-4 rounded text-white transition duration-300">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
