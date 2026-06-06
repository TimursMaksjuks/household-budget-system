<h1>Edit Financial Record</h1>

<form method="POST" action="{{ route('financial-records.update', $financialRecord) }}">

    @csrf
    @method('PUT')

<div>
    <label>Amount</label>
    <input type="number" step="0.01" name="amount" value="{{ $financialRecord->amount }}" required >

</div>

<br>

<div>
    <label>Date</label>
    <input type="date" name="date" value="{{ $financialRecord->date }}" required >
</div>

<br>

<div>
    <label>Description</label>
    <input type="text" name="description" value="{{ $financialRecord->description }}" required >
</div>

<br>

<div>
    <label>Type</label>

    <select name="record_type" required>
        <option value="income"
            {{ $financialRecord->record_type == 'income' ? 'selected' : '' }}>
            Income
        </option>

        <option value="expense"
            {{ $financialRecord->record_type == 'expense' ? 'selected' : '' }}>
            Expense
        </option>
    </select>
</div>

<br>

<div>
    <label>Category</label>

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

<button type="submit"> Update Record </button>

</form>

<br>

<a href="{{ route('financial-records.index') }}"> Back to Records </a>