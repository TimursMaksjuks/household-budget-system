<h1>{{ __('messages.edit_finance_record') }}</h1>   

<form method="POST" action="{{ route('financial-records.update', $financialRecord) }}">

    @csrf
    @method('PUT')

<div>
    <label>{{ __('messages.amount') }}</label>
    <input type="number" step="0.01" name="amount" value="{{ $financialRecord->amount }}" required >

</div>

<br>

<div>
    <label>{{ __('messages.date') }}</label>
    <input type="date" name="date" value="{{ $financialRecord->date }}" required >
</div>

<br>

<div>
    <label>{{ __('messages.description') }}</label>
    <input type="text" name="description" value="{{ $financialRecord->description }}" required >
</div>

<br>

<div>
    <label>{{ __('messages.type') }}</label>

    <select name="record_type" required>
        <option value="income"
            {{ $financialRecord->record_type == 'income' ? 'selected' : '' }}>
            {{ __('messages.income') }}
        </option>

        <option value="expense"
            {{ $financialRecord->record_type == 'expense' ? 'selected' : '' }}>
            {{ __('messages.expense') }}
        </option>
    </select>
</div>

<br>

<div>
    <label>{{ __('messages.category') }}</label>

    <select name="category_id" required>
        @foreach($categories as $category)

            <option
                value="{{ $category->id }}"
                {{ $financialRecord->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>

        @endforeach
    </select>
</div>

<br>

<button type="submit"> {{ __('messages.update_record') }} </button>

</form>

<br>

<a href="{{ route('financial-records.index') }}"> {{ __('messages.back_to_records') }} </a>