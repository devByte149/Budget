<?php

    class Bill {
        public int $id;
        public string $name;
        public float $amount;
        public bool $isPaid;
        public string $description;
        public ?DateTime $dueDate;
    }
    
    function get_all_bills(PDO $pdo) {
        $stmt = $pdo->query("SELECT * FROM Bill");
        // 1. Fetch all data as a simple associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $bills = []; // Create an empty array to hold our objects

        // 2. Loop through each result row
        foreach ($results as $row) {
            // 3. Create a new Bill object for each row
            $bill = new Bill();
            $bill->id = (int)$row['id'];
            $bill->name = $row['name'];
            $bill->amount = (float)$row['amount'];
            $bill->isPaid = (bool)$row['isPaid'];
            $bill->description = $row['description'];

            // 4. Manually create a DateTime object from the date string
            $bill->dueDate = new DateTime($row['dueDate']);

            // 5. Add the fully created object to our array
            $bills[] = $bill;
        }

        // 6. Return the final array of Bill objects
        return $bills;
    }

    function Get_Total($Bills) {
        $total = 0.00;
        foreach ($Bills as $bill) {
            if ($bill->isPaid) continue;
            $total += $bill->amount;
        }
        return $total;
    }

    function addBill($pdo) {
        $newBill = new Bill();
        $newBill->name = $_POST['billName'];
        $newBill->amount = $_POST['amount'];
        $newBill->dueDate = new DateTime($_POST['dueDate']);
        $newBill->description = $_POST['description'];
        $newBill->isPaid = $_POST['isPaid'];

        $sql = "INSERT INTO bill (name, amount, dueDate, isPaid, description) VALUES (?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $newBill->name, 
            $newBill->amount, 
            $newBill->dueDate->format('Y-m-d'), // Format the object to a string
            $newBill->isPaid, 
            $newBill->description
        ]);
    }

    function deleteBill($pdo) {
        $id = $_GET['id'];

        $sql = "DELETE FROM bill WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    function togglePay($pdo) {
        $id = $_GET['id'];
        if ($_GET['isPaid'] === '0') {
            $isPaid = true;
        } else {
            $isPaid = false;
        }

        $sql = "UPDATE bill SET isPaid = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$isPaid, $id]);
    }
?>