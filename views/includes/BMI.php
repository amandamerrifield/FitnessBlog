<form method="post" class="row" action="BMI.php">
    <div class="col">
        <label for="weight">Weight in kilograms: </label>
        <input type="number" name="weight" maxlength="4" autofocus required><br>
    </div>
    <div class="col">
        <label for="height">Height in centimetres: </label>
        <input type="number" name="height" maxlength="3" required><br>
    </div>
    <button type="submit" class="row btn btn-danger btn-rounded btn-sm my-0" value="Calculate"> Calculate</button>
    <button type="reset" class="row btn btn-danger btn-rounded btn-sm my-0">Reset</button>
</form>

<?php
//ini_set("display_errors", 1);
if (isset($_POST['weight']) && isset($_POST['height'])) {
    $weight = intval($_POST['weight']);
    $height = intval($_POST['height']);
     $result = $weight/pow(($height/100),2);

    echo "<p>Your BMI: " . number_format($result, 2, ",", ".") . "</p>";

    if ($result <= 18.4) {
        echo "<p style= 'color:#ff5c00;'>You are underweight.</p>";
    } else if ($result >= 25.0) {
        echo "<p style= 'color:#ff5c00;'>You are overweight.</p>";
    } else {
        echo "<p style= 'color:#00bc5c;'>Congratulations!You are in the normal range.</p>";
    }
}
?>
