@if(session('success'))

    <div style="
        background:#d4edda;
        color:#155724;
        padding:10px;
        margin-bottom:15px;
        border:1px solid #c3e6cb;
    ">
        {{ session('success') }}
    </div>

@endif


<h1>{{ __('messages.categories') }}</h1>

<a href="{{ route('categories.create') }}"> {{ __('messages.create_category') }} </a>

@foreach($categories as $category)

    <p>{{ $category->name }}</p>

    <a href="{{ route('categories.edit', $category) }}"> {{ __('messages.edit') }} </a>

    <form method="POST" action="{{ route('categories.destroy', $category) }}">

        @csrf
        @method('DELETE')

        <button type="submit"> {{ __('messages.delete') }} </button>

    </form>

@endforeach