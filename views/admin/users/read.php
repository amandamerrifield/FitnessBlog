
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
         
     <?php foreach ($users as $user): ?>
     <div class="card">
    <img  id="hike" class="img-fluid"   alt=""> 
    <div class="card-body">
      <h5 class="card-title" class="card-title" style="text-align:center"><?php print $user->getFirstName() ?></h5>
    
     
  
      <p class="card-text" style="text-align:center"><?php print $user->getUserContent() ?>
        
    </div>
    <div class="card-footer">
        <br>
      <p  class="button" style="text-align:center"><button type="button" class="btn btn-info">Contact</button></p>
      
          <p style="text-align:center"><small class="card-text" style="text-align:center"><?php print $user->getEmail() ?></small></p> 
      
       </div>
  </div>
          <?php endforeach; ?>
    </div>  
    
</div>
        
   


   
       
   




 


























         

