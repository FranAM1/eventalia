<x-app-layout>
    <div class="flex flex-col items-center gap-12 p-4 w-full">
        <div class="flex justify-around w-3/4">
            <img class="rounded-xl" src="{{ '../images/events/' . $event->image }}" alt="{{ $event->name }}">
            <div>
                <h1 class="text-4xl font-bold text-center text-blue-500 dark:text-yellow-500">{{ $event->name }}</h1>
            </div>
        </div>
        <div class="w-3/4 border-t-2 border-gray-700 dark:border-white">
            <x-form-comment :event="$event"></x-form-comment>
            <div class="flex flex-col gap-4 items-center w-full">
                @foreach ($comments as $comment)
                <div
                class="grid grid-cols-3 grid-rows-3 gap-4 items-start bg-white border-gray-600 p-4 border-2 rounded-xl dark:bg-gray-800 dark:border-white w-full">
                    <x-comment-card :comment="$comment"></x-comment-card>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>