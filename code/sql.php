<?php
include 'top.php';
?>
<main>
    <p>Create Table SQL</p>

    <pre>
    CREATE TABLE tblContact(
        pmkInfo INT AUTO_INCREMENT PRIMARY KEY,
        fldStore VARCHAR(40),
        fldManager VARCHAR(40),
        fldLocation VARCHAR(100),
    	fldPhone INT(9)
    )
    </pre>
    
    <pre>
    INSERT INTO tblContact (fldStore, fldManager, fldLocation, fldPhone) VALUES
("Orio","Cris","Arrantzale Kalea, 8, 20810 Orio",943244685),("Zarautz","Chari","Foruen Kalea, 2, 20800 Zarautz",943021834),
("Zumaia","Eukene","Erribera Kalea, 10, 20750 Zumaia",943543323),("Azpeitia","Ane","Foru Pasealekua Ibilbidea, 2, 20730 Azpeitia",943252375)
    </pre>
    <pre>
    SELECT fldStore, fldManager, fldLocation, fldPhone FROM tblContact;
    </pre>

    <pre>
    CREATE TABLE tblHiring(
    pmkHiringId INT AUTO_INCREMENT PRIMARY KEY,
    fldFirstName VARCHAR(30),
    fldLastName VARCHAR(40),
    fldEMail VARCHAR(50),
    fldExperience VARCHAR(25),
    fldBasque TINYINT(1),
    fldSpanish TINYINT(1),
    fldEnglish TINYINT(1),
    fldOther TINYINT(1),
    fldReason VARCHAR(500)
    )
    </pre>

    <pre>
    INSERT INTO tblHiring
(fldFirstName, fldLastName, fldEMail, fldExperience, fldBasque, fldSpanish, fldEnglish, fldOther,fldReason)
VALUES ('Amaia','Rodriguez','sdf@uvm.edu','No',0,1,1,0,'fdg');
    </pre>
    </main>

    <?php include 'footer.php'; ?>
    </body>
    </html>