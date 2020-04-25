<h2 id="pageTitle">BMI Calculator</h2>
<form method="post" action="index.php?controller=pages&action=bmi" >
    <div class="col">
        <label for="weight">Weight in kilograms: </label>
        <input type="number" name="weight" maxlength="4" autofocus required><br>
    </div>
    <div class="col">
        <label for="height">Height in centimetres: </label>
        <input type="number" name="height" maxlength="3" required><br>
    </div>
    <div class="col">
    <button type="submit" class="btn btn-danger btn-rounded" value="Calculate"> Calculate</button>
    <label></label>
    <button type="reset" class="btn btn-danger btn-rounded0">Reset</button>
    </div>
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
