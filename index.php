<?php 
include_once "header.php";

// Start session if not started already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Show login success message if it exists
if (isset($_SESSION["login_success"])) {
    echo "<p style='color: green; font-weight: bold; margin: 1em 0;'>" . $_SESSION["login_success"] . "</p>";
    unset($_SESSION["login_success"]);  // Clear message after showing it
}
?>

<section class="index_into">
    <h1>Available Puppies</h1>
    <p> Welcome to PuppySpot! Take a moment to browse our incredible selection of adorable, ready for love puppies. We only work with the country’s top breeders, offer three handle with care delivery options and a 10-year health commitment.
        So wherever you live we can deliver your perfect puppy! Complimentary consultations with one of our Puppy Concierges are available when you’re ready..</p>
</section>

<section class="index_categories">
    <h2>Puppies found their forever families</h2>
    <div class="index_categories_list">
        <div><h3>Doodle breeds</h3></div>
        <div><h3>Doodle breeds</h3></div>
        <div><h3>Doodle breeds</h3></div>
        <div><h3>Doodle breeds</h3></div>
    </div>
</section>

<?php 
include_once "footer.php";
?>
