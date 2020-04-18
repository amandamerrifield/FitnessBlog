<div id="mySidenav" class="sidenav" style="margin-left: 20px;" >
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div>
        <h5>Sort by level of difficulty:</h5>
    </div>
    <select class="form-control" id="ExperienceLevel" name="difficulty_id">
        <?php foreach ($difficulty as $level): ?>
            <option value="<?php print $level->getId() ?>"><?php print $level->getLevel() ?></option>
        <?php endforeach; ?>
    </select>
    <div>
        <h5>Sort by area of focus:</h5>
    </div>
    <select class="form-control" id="BodyPart" name="body_part_id">
        <?php foreach ($bodyParts as $part): ?>
            <option value="<?php print $part->getId() ?>"><?php print $part->getPart() ?></option>
        <?php endforeach; ?>

    </select>
    <div name="mysubmitbutton" id="mysubmitbutton" class="customButton" onClick="javascript:this.form.submit();">
        Search
    </div>
</div>
<div id="main">
    <span style="font-size:30px;cursor:pointer;color:blacl;" onclick="openNav()">&#9776; Search the Blog </span>
</div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        //document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        //document.getElementById("main").style.marginLeft= "0";
    }
// When the user scrolls down 20px from the top of the document, slide down the navbar
// When the user scrolls to the top of the page, slide up the navbar (50px out of the top view)
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-50px";
        }
    }
</script>
