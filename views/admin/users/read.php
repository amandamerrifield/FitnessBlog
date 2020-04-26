<div class="about-section">
    <h1 id="pageTitle" style="text-align:center">About Us Page</h1>
    <br>
    <p style="text-align:center">We want to ensure everyone is taking care of both their physical and mental wellbeing,
        especially during this time of self-isolation and social distancing. This is why we passionate to share some
        simple yet effective at home-workouts that have been designed to get you results in 30 days, simply by using
        your bodyweight and a couple of items you can find around your house.</p>
    <p style="text-align:center">Get ready to start your fitness journey and meet your online coaches down below!</p>
</div>
<br>
<h2 style="text-align:center">Our Team</h2>
<br>
<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-2">
        <?php foreach ($users as $user): ?>
            <?php if ($user->getAdmin() == 1) { ?>
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="<?php print $user->getPhoto() ?>" class="card-img-top" alt="Photo of the exercise ">
                        <div class="card-body">
                            <h5 id='h5' class="card-title"><?php print $user->getFirstName() ?></h5>
                            <p class="card-text"> <?php echo htmlspecialchars_decode($user->getUserContent(), ENT_QUOTES) ?></p>
                            <a href="mailto:<?php print $user->getEmail() ?>" class="btn btn-info" id='contact'>Contact me</a>
<!--                            <p class="card-text"> --><?php //print $user->getEmail() ?><!--</p>-->
                        </div>
                    </div>

                </div>
            <?php }
        endforeach;
        ?>
    </div>
</div>

<style>

    h5{
        background-color: pink;
        padding: 10%;
    }
</style>







































