<h1>Edit Budget</h1>

<form method="POST" action="{{ route('budgets.update', $budget) }}">

@csrf
@method('PUT')

<div>
    <label>Limit Amount</label>

    <input type="number" step="0.01" name="limit_amount" value="{{ $budget->limit_amount }}" required>

</div>

<br>

<div>
    <label>Period</label>

    <input type="text" name="period" value="{{ $budget->period }}" required >

</div>

<br>

<div>
    <label>Category</label>

    <select name="category_id" required>

        @foreach($categories as $category)

            <option
                value="{{ $category->id }}"
                {{ $budget->category_id == $category->id ? 'selected' : '' }}>

                {{ $category->name }}
            </option>

        @endforeach

    </select>

</div>

<br>

<button type="submit"> Update Budget </button>

</form>

<br>

<a href="{{ route('budgets.index') }}"> Back to Budgets </a>