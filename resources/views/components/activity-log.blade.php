@props(['activities'])
<ul class="bg-white dark:bg-gray-700 shadow rounded divide-y divide-gray-200 dark:divide-gray-600">
    @forelse($activities as $activity)
    <li class="px-4 py-2">{{ $activity->description }} - {{ $activity->created_at->format('Y-m-d H:i') }}</li>
    @empty
    <li class="px-4 py-2">No activity</li>
    @endforelse
</ul>
