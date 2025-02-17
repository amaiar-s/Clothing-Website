<nav>
    <a class="<?php
    if ($pathParts['filename'] == "index"){
        print 'activePage';
    }
    ?>" href="index.php">HOME</a> 

    <a class="<?php
    if ($pathParts['filename'] == "detail"){
        print 'activePage';
    }
    ?>" href="detail.php">SHOPS</a>
    
    <a class="<?php
    if ($pathParts['filename'] == "about"){
        print 'activePage';
    }
    ?>" href="about.php">ABOUT US</a> 

    <a class="<?php
    if ($pathParts['filename'] == "form"){
        print 'activePage';
    }
    ?>" href="form.php">HIRING</a> 
            
</nav>