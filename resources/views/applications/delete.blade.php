<form action="{{ route('application.destroy', $application) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">{{ $label ?? '' }}</button>
</form>