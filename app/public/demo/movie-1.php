
<?php require_once('includes/header.php'); ?>

        <div class="container my-3">
            <h1>The Auschwitz Report</h1>
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <img 
                        class="card-img-top"
                        src="https://resizing.flixster.com/g-5Hul9R0qvRM1A9hWMydgeyxZc=/206x305/v2/https://resizing.flixster.com/zd4AcmJIYgO_Uj9NIuFaSkXn4qg=/ems.ZW1zLXByZC1hc3NldHMvbW92aWVzLzE2ZDU3Nzk2LTMxMWItNDdlYS04MmFlLTA5N2FkNTdkOGFlMy5qcGc="
                        alt="poster The Auschwitz Report"
                    />
                </div>
                <div class="col-md-8 col-lg-9">
                    <div class="h3">1956 
                            <?php echo check_old_movie($movies[0]['year']);?>
                    </div>
                    <div class="mb-3"><strong>Runtime: </strong><?php echo runtime_prettier ($movies["0"]["runtime"]); ?></div>
                    <div class="mb-3"><strong>Genre: </strong>Drama, History</div>
                    <div class="description mb-3">
                    This is the true story of Freddy and Walter -- two young Slovak Jews, who were deported to Auschwitz in 1942. On 10 April 1944, after meticulous planning and with the help and the resilience of their inmates, they manage to escape. While the inmates, they had left behind, courageously stand their ground against the Nazi officers, the two men are driven on by the hope that their evidence could save lives. Emaciated and hurt, they make their way through the mountains back to Slovakia. With the help of chance encounters, they finally manage to cross the border and meet the resistance and The Red Cross. They compile a detailed report about the systematic genocide at the camp. However, with Nazi propaganda and international liaisons still in place, their account seems to be too harrowing to believe.
                    </div>
                    <div class="mb-3">
                        <strong>Producers: </strong>Peter Bebjak, Tomás Bombík, Jozef Pastéka
                    </div>
                    <div class="mb-3"><strong>Director: </strong>Peter Bebjak</div> 
                </div>
            </div>
        </div>

<?php require_once('includes/footer.php'); ?>
