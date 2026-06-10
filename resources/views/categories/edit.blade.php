<form method="POST" action="{{ route('categories.update', $category) }}">

    @csrf
    
    @method('PUT')

    <input type="text" name="name" value="{{ $category->name }}">

    <button type="submit"> {{ __('messages.save') }} </button>

</form>