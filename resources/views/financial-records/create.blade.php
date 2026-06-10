<h1>{{ __('messages.create_finance_record') }}</h1>

<form method="POST" action="{{ route('financial-records.store') }}">

    @csrf


    <div>
        <label>{{ __('messages.amount') }}</label>
        <input type="number" step="0.01" name="amount">
    </div>


    <div>
        <label>{{ __('messages.date') }}</label>
        <input type="date" name="date">
    </div>


    <div>
        <label>{{ __('messages.description') }}</label>
        <textarea name="description" required></textarea>    
    </div>


    <div>
        <label>{{ __('messages.type') }}</label>
        <select name="record_type">
            <option value="income">{{ __('messages.income') }}</option>
            <option value="expense">{{ __('messages.expense') }}</option>
        </select>
    </div>


    <div>
        <label>{{ __('messages.category') }}</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>


    <button type="submit"> {{ __('messages.save') }} </button>
</form>