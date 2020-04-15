<!--
       <div class="about-section">
  <h1 style="text-align:center">About Us Page</h1>
  <br>
  <p style="text-align:center">We want to ensure everyone is taking care of both their physical and mental wellbeing, especially during this time of self-isolation and social distancing. This is why we passionate to share some simple yet effective at home-workouts that have been designed to get you results in 30 days, simply by using your bodyweight and a couple of items you can find around your house.</p>
  <p style="text-align:center">Get ready to start your fitness journey and meet your online coaches down below!</p>
</div>
<br>
<h2 style="text-align:center">Our Team</h2>

<br>


    <div class="container-fluid">
        
      <div class="card-deck">
     
  <div class="card">
    <img  id="hike" class="img-fluid"  src="../images/hiking.jpg" alt="">
    <div class="card-body">
      <h5 class="card-title" class="card-title" style="text-align:center">Amanda</h5>
    
     
  
      <p class="card-text" style="text-align:center">Amanda is an outdoor exercise enthusiast, and loves to take long hikes, rock climb and swim in the ocean. 
            However her preferred indoor exercise is yoga and weight training.</p>
    
        
    </div>
    <div class="card-footer">
        <br>
      <p  class="button" style="text-align:center"><button type="button" class="btn btn-info">Contact</button></p>
      
      
      
      
      
       </div>
  </div>
     
-->

   
       
   
       
       
       
       <div class="container">
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Manage Users</h3>
        <div class="card-body">
            <table class="table fixed_header table-bordered table-responsive-sm table-striped text-center">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>admin</th>
                    <th>username</th>
                    <th>email</th>
<!--                    show hidden password?-->
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th></th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php print $user->getId() ?></td>
                        <td><?php print $user->getAdmin() ?></td>
                        <td><?php print $user->getUsername() ?></td>
                        <td><?php print $user->getEmail()?></td>
<!--                        <td>--><?php //print $user->getPassword()?><!--</td>-->
                        <td><?php print $user->getCreatedAt() ?></td>
                        <?php print $user->getUpdatedAt() ?>
                        <td>
                            <a href="index.php?controller=users&action=update&id=<?php print $user->getId() ?>">Edit</a>
                        </td>
                        <td>
                            <a href="index.php?controller=users&action=delete&id=<?php print $user->getId() ?>">Delete</a>
                        </td>
                    </tr>
                    
                 <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




 


























         

