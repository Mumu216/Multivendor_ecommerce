@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <p>-{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif
