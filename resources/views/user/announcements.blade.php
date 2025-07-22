<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Latest Announcements</h1>

    @foreach($announcements as $a)
        <div class="mb-4 p-4 border">
            <h2 class="font-semibold">{{ $a->title }}</h2>
            <p>{{ $a->content }}</p>
        </div>
    @endforeach
</x-app-layout>
