@foreach($schedules as $s)
    <div class="mb-4 p-4 border">
        <h2 class="font-semibold">{{ $s->title }}</h2>
        <p><strong>Date:</strong> {{ $s->date }} | <strong>Time:</strong> {{ $s->time }}</p>
        @if($s->location)
            <p><strong>Location:</strong> {{ $s->location }}</p>
        @endif
        @if($s->description)
            <p>{{ $s->description }}</p>
        @endif

        <form method="POST" action="{{ route('enrollments.store', $s) }}" class="mt-2">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Apply / Enroll</button>
        </form>
    </div>
@endforeach
