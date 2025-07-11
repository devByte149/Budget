<div class="row">
        <div class="twelve columns">
            <h1 class="text-center">
                OUR Bills
            </h1>
        </div>
        <div>
            <table class="twelve columns">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Paid</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dbContents as $bill): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($bill->name); ?></td>
                            <td>$<?php echo htmlspecialchars($bill->amount); ?></td>
                            <td><?php echo $bill->dueDate->format('m/d/Y'); ?></td>
                            <td><?php 
                                if ($bill->isPaid) {
                                    echo "Paid";
                                } else {
                                    echo "Not Paid";
                                }
                            ?></td>
                            <td>
                                <a href="index.php?action=edit" class="button button-primary">Edit</a>
                                <a href="index.php?action=delete&id=<?php echo $bill->id; ?>" class="button button-primary">Delete</a>
                                <a href="index.php?action=paid&id=<?php echo $bill->id; ?>&isPaid=<?php echo $bill->isPaid ? 1 : 0; ?>" class="button button-primary">Paid</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="1" style="text-align: right;"><strong>Total:</strong></td>
                        <td colspan="3" style="text-align: left;">$<?php echo number_format(Get_Total($dbContents), 2); ?></td>
                        <td>
                            <a href="index.php?action=add" class="button button-primary">Add</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>