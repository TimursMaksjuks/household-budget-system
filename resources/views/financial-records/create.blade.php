<h1>Add Financial Record</h1>

<form method="POST" action="{{ route('financial-records.store') }}">

    @csrf


    <div>
        <label>Amount</label>
        <input type="number" step="0.01" name="amount">
    </div>


    <div>
        <label>Date</label>
        <input type="date" name="date">
    </div>


    <div>
        <label>Description</label>
        <textarea name="description" required></textarea>    
    </div>


    <div>
        <label>Type</label>
        <select name="record_type">
            <option value="income">Income</option>
            <option value="expense">Expense</option>
        </select>
    </div>


    <div>
        <label>Category</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>


    <button type="submit"> Save </button>
</form>