<?php 
include 'top.php';

$fromEmail = "arodri24@uvm.edu";

$dataIsGood= false;
$errorMessage = '';
$message = '';

$firstName='';
$lastName='';
$email = '';
$experience = 'No';
$basque = 1;
$spanish = 0;
$english = 0;
$other = 0;
$reason = '';

function getData($field){
    if(!isset($_POST[$field])){
        $data="";
    }
    else{
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString){
    return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    print PHP_EOL . '<!-- Starting Sanitization -->' . PHP_EOL;

    $firstName=getData('txtFirstName');
    $lastName=getData('txtLastName');
    $email = getData('txtEmail');
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $experience = getData('radExperience');
    $basque= (int) getData('chkBasque');
    $spanish = (int) getData('chkSpanish');
    $english = (int) getData('chkEnglish');
    $other = (int) getData('chkOther');
    $reason=getData('txtReason');

    if($firstName ==''){
        $errorMessage .= '<p class = "mistake"> Please type in your first name. </p>';
        $dataIsGood = false;
    } elseif(!verifyAlphaNum($firstName)){
        $errorMessage .= '<p class ="mistake">Your first name contains invalid characters, please just use letters.</p>';
        $dataIsGood = false;
    }

    if($lastName ==''){
        $errorMessage .= '<p class = "mistake"> Please type in your last name. </p>';
        $dataIsGood = false;
    } elseif(!verifyAlphaNum($lastName)){
        $errorMessage .= '<p class ="mistake">Your last name contains invalid characters, please just use letters.</p>';
        $dataIsGood = false;
    }

    if($email ==''){
        $errorMessage .= '<p class = "mistake"> Please type in your email address. </p>';
        $dataIsGood = false;
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMessage .= '<p class ="mistake">Your email address contains invalid characters.</p>';
        $dataIsGood = false;
    }

    if($experience != "No" AND $experience != "ABit" AND $experience != "Plenty"){
        $errorMessage .= '<p class ="mistake">Please tell if you have any previous experience.</p>';
        $dataIsGood = false;
    }

    $totalChecked = 0;

    if($basque !=1) $basque = 0;
    $totalChecked += $basque;

    if($spanish !=1) $spanish = 0;
    $totalChecked += $spanish;

    if($english !=1) $english = 0;
    $totalChecked += $english;

    if($other !=1) $other = 0;
    $totalChecked += $other;

    if($totalChecked == 0){
        $errorMessage .= '<p class ="mistake">Please choose at least one checkbox.</p>';
        $dataIsGood = false;
    }

    if($reason ==''){
        $errorMessage .= '<p class = "mistake"> Please type in why we should hire you. </p>';
        $dataIsGood = false;
    } elseif(!verifyAlphaNum($reason)){
        $errorMessage .= '<p class ="mistake">Text contains invalid characters, please just use letters.</p>';
        $dataIsGood = false;
    }

    print '<!-- Start Saving -->';
    if($dataIsGood){
        $sql = 'INSERT INTO tblHiring
        (fldFirstName, fldLastName, fldEMail, fldExperience, fldBasque, fldSpanish, fldEnglish, fldOther, fldReason)
        VALUES (?,?,?,?,?,?,?,?,?)';
        $data = array($firstName,$lastName,$email,$experience,$basque,$spanish,$english,$other,$reason);

        try{
            $statement = $pdo->prepare($sql);
            if($statement->execute($data)){
                $message = '<h2>Thank you for filling out the form</h2>';
                $message .= '<p>Your information was successfully saved.</p>';
            } else{
                $message = '<p>Record was NOT successfully saved, please try again.</p>';
                $dataIsGood = false;
            }
        } catch (PDOException $e){
            $message .= '<p>Couldn\'t insert the record, please contact someone</p>';
        }

        $to = $_POST['txtEmail']; 
        $subject = "Job Application Submission"; 
        
        $emailBody = "Dear {$firstName} {$lastName},\n\n";
        $emailBody .= "Thank you for your job application.\n";
        
        $headers = "From: $fromEmail" . "\r\n";
        $headers .= "Reply-To: $fromEmail" . "\r\n";
        
        if (mail($to, $subject, $emailBody, $headers)) {
            $message = '<h2>Thank you for filling out the form</h2>';
            $message .= '<p>Your information was successfully saved.</p>';
        } else {
            $message = '<p>Failed to send email.</p>';
        }
    }

}

?>

    <body>
        <main>
            <?php
            print $message;
            print $errorMessage;

            print '<p>Post Array:</p><pre>';
            print_r($_POST);
            print '</pre>';
            ?>
            <section>
                <h2>WE ARE HIRING!</h2>
                <p>If you are experience in being a member of KAÏOA's crew, please complete this form: </p>
            </section>
            <form action="#" method="POST">
                <fieldset>
                    <legend>Contact Information</legend>
                    <p>
                        <label for="txtFirstName">First Name:</label>
                        <input type="text" name="txtFirstName" id="txtFirstName"
                        value = "<?php print $firstName; ?>" required>
                    </p>
                    <p>
                        <label for="txtLastName">Last Name:</label>
                        <input type="text" name="txtLastName" id="txtLastName"
                        value = "<?php print $lastName; ?>" required>
                    </p>
                    <p>
                        <label for="txtEmail">Email</label>
                        <input type="text" name="txtEmail" id="txtEmail"
                        value = "<?php print $email; ?>" required>
                    </p>
                </fieldset>

                <fieldset>
                <p>Do you have previous experience working in a store?</p>
   
                    <p>
                        <input type="radio" name="radExperience" value="No" id="radExperienceNo" 
                        <?php if ($interested == 'No') print 'checked'; ?> required>
                        <label for="radExperienceNo">No</label>
                    </p>

                    <p>
                        <input type="radio" name="radExperience" value="ABit" id="radExperienceABit" 
                        <?php if ($interested == 'Abit') print 'checked'; ?> required>
                        <label for="radExperienceABit">A Bit</label>
                    </p>

                    <p>
                        <input type="radio" name="radExperience" value="Plenty" id="radExperiencePlenty" 
                        <?php if ($interested == 'Plenty') print 'checked'; ?> required>
                        <label for="radExperiencePlenty">Plenty</label>
                    </p>         
                    
                </fieldset>

                <fieldset>

                    <p>Mark if you know how to speak the following languages: </p>
                    <p>
                        <input type="checkbox" id="chkBasque" name="chkBasque" value="1"
                        <?php if(isset($_POST['chkBasque']) && ($_POST['chkBasque'] == 1)) print 'checked'; ?> >
                        <label for="chkBasque">Basque</label>
                    </p>
                    <p>
                        <input type="checkbox" id="chkSpanish" name="chkSpanish" value="1"
                        <?php if(isset($_POST['chkSpanish']) && ($_POST['chkSpanish'] == 1)) print 'checked'; ?> >
                        <label for="chkSpanish">Spanish</label>
                    </p>
                    <p>
                        <input type="checkbox" id="chkEnglish" name="chkEnglish" value="1"
                        <?php if(isset($_POST['chkEnglish']) && ($_POST['chkEnglish'] == 1)) print 'checked'; ?> >
                        <label for="chkEnglish">English</label>
                    </p>
                    <p>
                        <input type="checkbox" id="chkOther" name="chkOther" value="1"
                        <?php if(isset($_POST['chkOther']) && ($_POST['chkOther'] == 1)) print 'checked'; ?> >
                        <label for="chkOther">Other</label>
                    </p>
                    
                </fieldset>
                <fieldset>
                    <p>
                        <label for="txtReason">Tell us why we should hire you: </label>
                        <textarea id="txtReason" name="txtReason" tabindex=500><?php print $reason;?></textarea>
                    </p>
                </fieldset>
                <fieldset>
                    <p>
                        <input type="submit"> 
                    </p>
                </fieldset>
            </form>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>