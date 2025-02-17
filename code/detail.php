<?php 
include 'top.php';
?>
    <body>
   
        <main>
            <h1>Our Shops</h1>
            <section class="grid-container">
            <section class="grid-item">
                <img alt="Kaioa Orio" src="images/orio.jpeg" class="image">
                <h2>KAÏOA Orio</h2>
                <p>It all started in 2010, Kaioa Orio was the starting point of this adventure, fueled by hard work and dedication, driven by a dream. Since those early days, our core philosophy remains unchanged, driven by an unwavering commitment to our customers. We continue to evolve, always seeking innovative ways to offer the very best, ensuring that every experience with us exceeds expectations."</p>
            </section>

            <section class="grid-item">
                <img alt="Kaioa Zarautz" src="images/zarautz.png" class="image">
                <h2>KAÏOA Zarautz</h2>
                <p>Zarautz, known for its cosmopolitan vibe and unerring sense of taste, has always been a place of allure. At Kaïoa, we endeavor to contribute to Zarautz's vibrant essence by infusing it with the timeless allure of our offerings. Like the enduring granite that defines this town, our presence seeks to complement and enrich, ensuring that Zarautz continues to exude its distinct charm, never losing its inherent essence.</p>
            </section>

            <section class="grid-item">
                <img alt="Kaioa Zumaia" src="images/zumaia.jpeg" class="image">
                <h2>KAÏOA Zumaia</h2>
                <p>From the very beginning, we've felt immensely grateful for the affection and closeness shown to us by the people of Zumaia. It's their love and sense of connection that have deeply touched us. We've always aimed to reciprocate this warmth through our work, cherishing and valuing this bond in every aspect of what we do.</p>
            </section>

            <section class="grid-item">
                <img alt="Kaioa Azpeitia" src="images/azpeitia.jpeg" class="image">
                <h2>KAÏOA Azpeitia</h2>
                <p>Azpeitia is a place of ambiance and vibrant life. At Kaïoa, we aspire to bring the coastal breeze to the streets of Azpeitia, offering everyone the work and affection that we know and cherish.</p>
            </section>

            <section class="grid-item" id="grid-table">
                <h2>Contact Us</h2>
                <p>If you have any queries please don't hesitate to contact our various stores.</p>

                <table>
                    <caption>Contact Information</caption>
                    <tr>
                        <th>Store</th>
                        <th>Manager</th>
                        <th>Location</th>
                        <th>Phone</th>
                    </tr>
<?php
$sql = 'SELECT fldStore, fldManager, fldLocation, fldPhone FROM tblContact';
$statement = $pdo->prepare($sql);
$statement->execute();

$records = $statement->fetchAll();

foreach($records as $record){
    print '<tr>';
    print '<td>' . $record['fldStore'] . '</td>';
    print '<td>' . $record['fldManager'] . '</td>';
    print '<td>' . $record['fldLocation'] . '</td>';
    print '<td>' . $record['fldPhone'] . '</td>';
    print '</tr>' . PHP_EOL;
}
?>

                    <tr>
                        <td colspan="4"><cite>@kaioa_denda</cite></td>
                    </tr>
                </table>
            
            </section>
</section>
            
           
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>