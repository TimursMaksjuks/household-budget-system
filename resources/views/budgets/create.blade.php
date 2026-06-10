<h1>{{ __('messages.add_budget') }}</h1>

<form method="POST" action="{{ route('budgets.store') }}">

@csrf

<div>
    <label>{{ __('messages.limit_amount') }}</label>
    <input type="number" step="0.01" name="limit_amount" required>

</div>

<br>

<div>
    <label>{{ __('messages.period') }}</label>
    <input type="text" name="period" placeholder="June 2026" required>

</div>

<br>

<div>
    <label>{{ __('messages.category') }}</label>

    <select name="category_id" required>

        @foreach($categories as $category)

            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>

        @endforeach

    </select>
</div>

<br>

<button type="submit"> {{ __('messages.save_budget') }} </button>


</form>

<br>

<a href="{{ route('budgets.index') }}"> {{ __('messages.back_to_budgets') }} </a>