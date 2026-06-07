<h1>Add Budget</h1>

<form method="POST" action="{{ route('budgets.store') }}">

@csrf

<div>
    <label>Limit Amount</label>
    <input type="number" step="0.01" name="limit_amount" required>

</div>

<br>

<div>
    <label>Period</label>
    <input type="text" name="period" placeholder="June 2026" required>

</div>

<br>

<div>
    <label>Category</label>

    <select name="category_id" required>

        @foreach($categories as $category)

            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>

        @endforeach

    </select>
</div>

<br>

<button type="submit"> Save Budget </button>


</form>

<br>

<a href="{{ route('budgets.index') }}"> Back to Budgets </a>