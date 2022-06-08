@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <!-- User Profile Tab Card -->
    <div class="flex flex-row rounded-lg border border-gray-200/80 bg-white p-6">
        <!-- Avaar Container -->
        <div class="relative">
            <!-- User Avatar -->
            <img class="w-40 h-40 rounded-md object-cover" src="https://dummyimage.com/256x256"
                 alt="User" />
        </div>

        <!-- Meta Body -->
        <div class="flex flex-col px-6">
            <!-- Username Container -->
            <div class="flex h-8 flex-row">
                <!-- Username -->
                <a href="https://github.com/EgoistDeveloper/" target="_blank">
                    <h2 class="text-lg font-semibold capitalize">{{ $user->name }}</h2>
                </a>

                <!-- User Verified -->
                <svg class="my-auto ml-2 h-5 fill-blue-400" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" />
                </svg>
            </div>

            <!-- Meta Badges -->
            <div class="my-2 flex flex-row space-x-2">
                <!-- Badge Role -->
                <div class="flex flex-row">
                    <svg class="mr-2 h-4 w-4 fill-gray-500/80" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7.07,18.28C7.5,17.38 10.12,16.5 12,16.5C13.88,16.5 16.5,17.38 16.93,18.28C15.57,19.36 13.86,20 12,20C10.14,20 8.43,19.36 7.07,18.28M18.36,16.83C16.93,15.09 13.46,14.5 12,14.5C10.54,14.5 7.07,15.09 5.64,16.83C4.62,15.5 4,13.82 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,13.82 19.38,15.5 18.36,16.83M12,6C10.06,6 8.5,7.56 8.5,9.5C8.5,11.44 10.06,13 12,13C13.94,13 15.5,11.44 15.5,9.5C15.5,7.56 13.94,6 12,6M12,11A1.5,1.5 0 0,1 10.5,9.5A1.5,1.5 0 0,1 12,8A1.5,1.5 0 0,1 13.5,9.5A1.5,1.5 0 0,1 12,11Z" />
                    </svg>

                    <div class="text-xs text-gray-400/80 hover:text-gray-400">Fullstack Developer</div>
                </div>

                <!-- Badge Location -->
                <div class="flex flex-row">
                    <svg class="mr-2 h-4 w-4 fill-gray-500/80" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5M12,2A7,7 0 0,1 19,9C19,14.25 12,22 12,22C12,22 5,14.25 5,9A7,7 0 0,1 12,2M12,4A5,5 0 0,0 7,9C7,10 7,12 12,18.71C17,12 17,10 17,9A5,5 0 0,0 12,4Z" />
                    </svg>

                    <div class="text-xs text-gray-400/80 hover:text-gray-400">France</div>
                </div>

                <!-- Badge Email-->
                <div class="flex flex-row">
                    <svg class="mr-2 h-4 w-4 fill-gray-500/80" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24">
                        <path
                            d="M12,15C12.81,15 13.5,14.7 14.11,14.11C14.7,13.5 15,12.81 15,12C15,11.19 14.7,10.5 14.11,9.89C13.5,9.3 12.81,9 12,9C11.19,9 10.5,9.3 9.89,9.89C9.3,10.5 9,11.19 9,12C9,12.81 9.3,13.5 9.89,14.11C10.5,14.7 11.19,15 12,15M12,2C14.75,2 17.1,3 19.05,4.95C21,6.9 22,9.25 22,12V13.45C22,14.45 21.65,15.3 21,16C20.3,16.67 19.5,17 18.5,17C17.3,17 16.31,16.5 15.56,15.5C14.56,16.5 13.38,17 12,17C10.63,17 9.45,16.5 8.46,15.54C7.5,14.55 7,13.38 7,12C7,10.63 7.5,9.45 8.46,8.46C9.45,7.5 10.63,7 12,7C13.38,7 14.55,7.5 15.54,8.46C16.5,9.45 17,10.63 17,12V13.45C17,13.86 17.16,14.22 17.46,14.53C17.76,14.84 18.11,15 18.5,15C18.92,15 19.27,14.84 19.57,14.53C19.87,14.22 20,13.86 20,13.45V12C20,9.81 19.23,7.93 17.65,6.35C16.07,4.77 14.19,4 12,4C9.81,4 7.93,4.77 6.35,6.35C4.77,7.93 4,9.81 4,12C4,14.19 4.77,16.07 6.35,17.65C7.93,19.23 9.81,20 12,20H17V22H12C9.25,22 6.9,21 4.95,19.05C3,17.1 2,14.75 2,12C2,9.25 3,6.9 4.95,4.95C6.9,3 9.25,2 12,2Z" />
                    </svg>

                    <div class="text-xs text-gray-400/80 hover:text-gray-400">who@am.i</div>
                </div>
            </div>

            <!-- Mini Cards -->
            <div class="mt-2 flex flex-row items-center space-x-5">
                <!-- Questions -->
                <a href="#"
                   class="flex h-20 w-40 flex-col items-center justify-center rounded-md border border-dashed border-gray-200 transition-colors duration-100 ease-in-out hover:border-gray-400/80">
                    <div class="flex flex-row items-center justify-center">
                        <svg class="mr-3 fill-gray-500/95" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 512 512">
                            <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 400c-18 0-32-14-32-32s13.1-32 32-32c17.1 0 32 14 32 32S273.1 400 256 400zM325.1 258L280 286V288c0 13-11 24-24 24S232 301 232 288V272c0-8 4-16 12-21l57-34C308 213 312 206 312 198C312 186 301.1 176 289.1 176h-51.1C225.1 176 216 186 216 198c0 13-11 24-24 24s-24-11-24-24C168 159 199 128 237.1 128h51.1C329 128 360 159 360 198C360 222 347 245 325.1 258z"/>
                        </svg>

                        <span class="font-bold text-gray-600">{{ count($questions) }}</span>
                    </div>

                    <div class="mt-2 text-sm text-gray-400">Questions</div>
                </a>

                <!-- Answers -->
                <a href="#"
                   class="flex h-20 w-40 flex-col items-center justify-center rounded-md border border-dashed border-gray-200 transition-colors duration-100 ease-in-out hover:border-gray-400/80">
                    <div class="flex flex-row items-center justify-center">
                        <svg class="mr-3 fill-gray-500/95" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 512 512">
                            <path d="M256 31.1c-141.4 0-255.1 93.12-255.1 208c0 49.62 21.35 94.98 56.97 130.7c-12.5 50.37-54.27 95.27-54.77 95.77c-2.25 2.25-2.875 5.734-1.5 8.734c1.249 3 4.021 4.766 7.271 4.766c66.25 0 115.1-31.76 140.6-51.39c32.63 12.25 69.02 19.39 107.4 19.39c141.4 0 255.1-93.13 255.1-207.1S397.4 31.1 256 31.1zM127.1 271.1c-17.75 0-32-14.25-32-31.1s14.25-32 32-32s32 14.25 32 32S145.7 271.1 127.1 271.1zM256 271.1c-17.75 0-31.1-14.25-31.1-31.1s14.25-32 31.1-32s31.1 14.25 31.1 32S273.8 271.1 256 271.1zM383.1 271.1c-17.75 0-32-14.25-32-31.1s14.25-32 32-32s32 14.25 32 32S401.7 271.1 383.1 271.1z"/>
                        </svg>

                        <span class="font-bold text-gray-600">{{ count($answers) }}</span>
                    </div>

                    <div class="mt-2 text-sm text-gray-400">Answers</div>
                </a>
            </div>
        </div>
    </div>

    <h3 class="mt-8 text-3xl font-bold text-center text-gray-900">Questions</h3>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-14 mx-auto">
            <div class="flex flex-wrap -mx-4 -my-8">
                @foreach($questions as $question)
                    <a href="{{ route("questions.show", $question) }}">
                        <div class="py-8 px-4 lg:w-1/3">
                            <div class="h-full flex items-start">
                                <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
                                    <span class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200">{{ substr(date('F', strtotime($question->created_at)), 0, 3) }}</span>
                                    <span class="font-medium text-lg text-gray-800 title-font leading-none">{{ date('d', strtotime($question->created_at)) }}</span>
                                </div>
                                <div class="flex-grow pl-6">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-indigo-500 mb-1">CATEGORY</h2>
                                    <h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{ $question->title }}</h1>
                                    <p class="leading-relaxed mb-5">{{ $question->description }}</p>
                                    <a class="inline-flex items-center">
                                        <img alt="blog" src="https://dummyimage.com/256x256" class="w-8 h-8 rounded-full flex-shrink-0 object-cover object-center">
                                        <span class="flex-grow flex flex-col pl-3">
                                        <span class="title-font font-medium text-gray-900">{{ $question->user->name }}</span>
                                    </span>
                                    </a>
                                </div>
                                @if(Auth::user()->id === $question->user->id)
                                    <div class="flex h-full items-center">
                                        <a href="{{ route("questions.edit", $question) }}" class="border border-gray-200 bg-gray-200 text-gray-700 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-300 focus:outline-none focus:shadow-outline">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route("questions.delete", $question) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <h3 class="mt-8 text-3xl font-bold text-center text-gray-900">Answers</h3>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-14 mx-auto">
            <div class="flex flex-wrap -mx-4 -my-8">
                @foreach($answers as $answer)
                    <a href="{{ route("questions.show", $answer->questions->id) }}">
                        <div class="py-8 px-4 lg:w-1/3">
                            <div class="h-full flex items-start">
                                <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
                                    <span class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200">{{ substr(date('F', strtotime($answer->created_at)), 0, 3) }}</span>
                                    <span class="font-medium text-lg text-gray-800 title-font leading-none">{{ date('d', strtotime($answer->created_at)) }}</span>
                                </div>
                                <div class="flex-grow pl-6">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-indigo-500 mb-1">QUESTION</h2>
                                    <h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{ $answer->questions->title }}</h1>
                                    <p class="leading-relaxed mb-5">{{ $answer->content }}</p>
                                    <a class="inline-flex items-center"></a>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
