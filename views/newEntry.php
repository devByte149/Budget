<div class="row">
    <form class="six columns offset-by-three" action="index.php?action=addBill" method="POST">
        <h5 class="text-center">Add a New Bill</h5>
        
        <!-- Bill Name Field -->
        <label for="billNameInput">Bill Name</label>
        <input 
            class="u-full-width" 
            type="text" 
            placeholder="e.g., Internet, Rent" 
            id="billNameInput" 
            name="billName"
            required>
            
        <!-- Amount Field -->
        <label for="amountInput">Amount</label>
        <input 
            class="u-full-width" 
            type="number" 
            placeholder="0.00" 
            id="amountInput" 
            name="amount"
            step="0.01"
            required>

        <!-- Due Date Field -->
        <label for="dueDateInput">Due Date</label>
        <input 
            class="u-full-width" 
            type="date" 
            id="dueDateInput"
            name="dueDate"
            required>

        <!-- Description Field -->
        <label for="descriptionInput">Description</label>
        <textarea 
            class="u-full-width" 
            placeholder="e.g., Monthly internet service for July" 
            id="descriptionInput" 
            name="description"></textarea>

        <!-- Paid Status Dropdown -->
        <label for="isPaidSelect">Status</label>
        <select class="u-full-width" id="isPaidSelect" name="isPaid">
            <option value="0">Not Paid</option>
            <option value="1">Paid</option>
        </select>
            
        <!-- Submit Button -->
        <input 
            class="button-primary u-full-width" 
            type="submit" 
            value="Add Bill">
    </form>
</div>
