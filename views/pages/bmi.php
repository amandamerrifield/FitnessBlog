<div class="container">
    <div class="row">
        <h2 id="pageTitle">BMI Calculator</h2>
    </div>
    <div class="row"> 
        <div class="col-xs-4 jumbotron">
            <h1>What is the body mass index (BMI)?</h1>
            <p>The body mass index (BMI) is a measure that uses your height and weight to work out if your weight is healthy. The BMI calculation divides an adult's weight in kilograms by their height in metres squared. For example, A BMI of 25 means 25kg/m2.</p>
            <p>If your BMI is: <br><br> below 18.5 – you're in the underweight range<br>between 18.5 and 24.9 – you're in the healthy weight range<br>between 25 and 29.9 – you're in the overweight range<br>between 30 and 39.9 – you're in the obese range </p>
            <a href="https://www.nhs.uk/common-health-questions/lifestyle/what-is-the-body-mass-index-bmi/">Click here for more information</a>

        </div>

        <div class="col-xs-3 jumbotron">
            <form method="post" action="index.php?controller=pages&action=bmi" >
                <div class="col">
                    <label for="weight">Weight in kilograms: </label><br>
                    <input type="number" name="weight" maxlength="4" autofocus required><br>
                </div>
                <div class="col">
                    <label for="height">Height in centimetres: </label><br>
                    <input type="number" name="height" maxlength="3" required><br>
                </div>
                <div class="col" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-info btn-rounded" value="Calculate"> Calculate</button>

                    <button type="reset" class="btn btn-info btn-rounded">Reset</button>
                </div>
            </form>

            <?php
//ini_set("display_errors", 1);
            if (isset($_POST['weight']) && isset($_POST['height'])) {
                $weight = intval($_POST['weight']);
                $height = intval($_POST['height']);
                $result = $weight / pow(($height / 100), 2);

                echo "<p>Your BMI: " . number_format($result, 2, ",", ".") . "</p>";

                if ($result <= 18.4) {
                    echo "<p style= 'color:#dd026d;'>You are underweight.</p>";
                } else if ($result >= 25.0) {
                    echo "<p style= 'color:#dd026d;'>You are overweight.</p>";
                } else {
                    echo "<p style= 'color:#29c1c4;'>Congratulations!You are in the normal range.</p>";
                }
            }
            ?>
        </div> 
        <div class="col-xs-4 jumbotron">
            <img id="BMI_chart" class="open" style="max-width: 200px;" src="views/images/BMI_chart_small.png" alt="BMI Chart"/>
        </div>
        <div class="popup-overlay">
            <div class="popup-content">
                <img id="BMI_chart" style="max-width: 600px;" src="views/images/BMI_chart.png" alt="BMI Chart"/>
                <button class="close"></button> 
            </div>
        </div>
        <script>
            $(".open").on("click", function () {
                $(".popup-overlay, .popup-content").addClass("active");
            });

            $(".close, .popup-overlay").on("click", function () {
                $(".popup-overlay, .popup-content").removeClass("active");
            });
        </script>   
        <style>
            .popup-overlay {
                visibility: hidden;
                position: absolute;

                left: 25%;
            }

            .popup-overlay.active {
                visibility: visible;
                text-align: center;
            }

            .popup-content {
                visibility: hidden;
            }

            .popup-content.active {
                visibility: visible;
            }
        </style>
    </div>

</div>