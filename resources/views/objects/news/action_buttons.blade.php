@auth
    <div class="btn-group" role="group">
        <a href="{{ route('news.edit', $item) }}"><button type="button" class="btn btn-secondary">Update</button></a>
        <form method="POST" action="{{ route('news.destroy', $item) }}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-secondary">Delete</button>
        </form>
    </div>
@endauth
