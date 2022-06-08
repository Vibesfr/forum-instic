@extends('layouts.app')

@section('title', 'Questions')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
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
                                        <span class="title-font font-medium text-gray-900 capitalize">{{ $question->user->name }}</span>
                                    </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
