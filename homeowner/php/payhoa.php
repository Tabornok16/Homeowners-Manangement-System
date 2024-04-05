<div class="container">
    <h2>HOA Dues Payment Form</h2>
    <form method="POST" action="payhoa-action.php">
    <input type="hidden" name="transactionDateTime" value="<?php echo $currentDateTime; ?>">
        <label for="lotArea">Lot Area (sqm):</label>
        <span name="lotArea" id="lotArea"><?php echo htmlspecialchars($lotArea); ?></span><br>

        <label for="price">Price per Square Meter:</label>
        <span id="price"><?php echo $price; ?></span><br>

        <label for="fromMonth">From Month:</label>
        <select id="fromMonth" name="from-month" onchange="calculateMonths()">
            <option value="">Select Month</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>

        <select name="fromYear" id="fromYear" onchange="calculateMonths()">
            <option value="">Select Year</option>
            <?php
            $currentYear = date('Y');
            $startYear = 2015;
            for ($year = $currentYear; $year >= $startYear; $year--) {
                echo "<option value='$year'>$year</option>";
            }
            ?>
        </select><br>

        <label for="toMonth">To Month:</label>
        <select id="toMonth" name="to-month" onchange="calculateMonths()">
            <option value="">Select Month</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>

        <select name="toYear" id="toYear" onchange="calculateMonths()">
            <option value="">Select Year</option>
            <?php
            $currentYear = date('Y');
            $startYear = 2015;
            for ($year = $currentYear; $year >= $startYear; $year--) {
                echo "<option value='$year'>$year</option>";
            }
            ?>
        </select><br>


        <label for="payment-amount">Payment Amount:</label>
        <input type="text" id="payment-amount" name="payment-amount" value="<?php echo $paymentAmount; ?>" readonly><br>

        <label for="refnum">Bank/Payment Reference Number</label>
        <input type="text" id="refnum" name="reference-number" placeholder="Reference Number"><br>

        <button type="submit">Submit</button>
    </form>
</div>

<script>

</script>

<?php include('partial/footer.php') ?>
