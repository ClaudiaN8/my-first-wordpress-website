<?php require_once('includes/header.php'); ?>

        <div class="container my-3">
            <div class="text-center">
                <h1>Good <?php echo hello_time_message(date("G")); ?>, today is <?php echo date("l, F j, Y"); ?>. How about a movie?</h1>
                <button
                    type="button"
                    class="btn btn-info"
                    onclick="window.location.href='movies.php'"
                >
                    Movies
                </button>
            </div>
        </div>

<?php require_once('includes/footer.php'); ?>
        
