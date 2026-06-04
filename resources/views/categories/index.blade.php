<h1>Categories</h1>

<a href="{{ route('categories.create') }}"> Create Category </a>

@foreach($categories as $category)

    <p>{{ $category->name }}</p>

    <a href="{{ route('categories.edit', $category) }}"> Edit </a>

    <form method="POST" action="{{ route('categories.destroy', $category) }}">

        @csrf
        @method('DELETE')

        <button type="submit"> Delete </button>

    </form>

@endforeach