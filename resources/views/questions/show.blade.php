@extends('layouts.app')

@section('title', 'Show')

@section('content')
    <main class="mt-10">

        <div class="mb-4 md:mb-0 w-full mx-auto relative">
            <div class="px-4 lg:px-0">
                <h2 class="text-4xl font-semibold text-gray-800 leading-tight">{{ $questions->title }}</h2>
                <a
                    href="#"
                    class="py-2 text-green-700 inline-flex items-center justify-center mb-2"
                >
                    Cryptocurrency
                </a>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row lg:space-x-12">

            <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
                <p class="pb-6">{{ $questions->content }}</p>
            </div>

            <div class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm">
                <div class="p-4 border-t border-b md:border md:rounded">
                    <div class="flex justify-between py-2">
                        <div class="flex">
                            <img alt="blog" src="https://dummyimage.com/256x256" class="h-10 w-10 rounded-full mr-2 object-cover">
                            <div>
                                <p class="font-semibold text-gray-700 text-sm capitalize">{{ $questions->user->name }}</p>
                                <p class="font-semibold text-gray-600 text-xs">Author</p>
                            </div>
                        </div>
                        <a href="{{ route("profile.show", $questions->user) }}" class="px-2 py-1 text-gray-100 bg-indigo-500 flex w-6/12 items-center justify-center rounded">
                            See Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="antialiased mx-auto max-w-screen-sm pt-24">
            <h3 class="mb-8 text-3xl font-bold text-center text-gray-900">Answers ({{ count($questions->answers) }})</h3>
            <div class="space-y-4">
                @if(count($questions->answers) != 0)
                    <form method="POST" action="{{ route('answers.store', $questions) }}" enctype="multipart/form-data" >
                        @csrf
                        <div class="max-w-2xl mx-auto">
                            <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Contenu</label>
                            <div class="relative mb-6">
                                <textarea name="content" id="content" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 -500-500" placeholder="Answer to the question"></textarea>
                            </div>

                            <input type="submit" name="answer" value="Answer" class="w-full border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                        </div>
                    </form>
                    @foreach($questions->answers as $answer)
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://dummyimage.com/256x256" alt="">
                            </div>
                            <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                <strong class="capitalize mr-1">{{ $answer->user->name }}</strong> <span class="text-xs text-gray-400">{{ $answer->timeAgo($answer->created_at) }}</span>
                                @if(Auth::user()->id === $answer->user->id)
                                    <form method="POST" action="{{ route("answers.delete", $answer) }}" class="contents">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="text-xs text-red-400">
                                            delete
                                        </button>
                                    </form>
                                @endif
                                <p class="text-sm">{{ $answer->content }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-lg text-gray-400">Be the first to answer this question</p>

                    <form method="POST" action="{{ route('answers.store', $questions) }}" enctype="multipart/form-data" >
                        @csrf
                        <div class="max-w-2xl mx-auto">
                            <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Contenu</label>
                            <div class="relative mb-6">
                                <textarea name="content" id="content" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 -500-500" placeholder="Answer to the question"></textarea>
                            </div>

                            <input type="submit" name="answer" value="Answer" class="w-full border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </main>
@endsection
