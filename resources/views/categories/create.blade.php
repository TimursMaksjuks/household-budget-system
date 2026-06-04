<form method="POST" action="{{ route('categories.store') }}">

    @csrf

    <input type="text" name="name">

    <button type="submit"> Create </button>

</form>