<?php 
    date_default_timezone_set('Europe/Bucharest');

    function hello_time_message($hour){
        if ($hour >= 17){
            return "evening";
        } else if ($hour >= 12){
            return "afternoon";
        } else if ($hour >= 5){
            return "morning";
        } else return "night";
    };

    function runtime_prettier($runtime = 0){

        if ($runtime == 0 ){ // || !is_numeric($runtime)
            return 'No runtime info';
        } else if ($runtime == 1) {
            return $runtime . ' minute';
        } else if ($runtime > 1 && $runtime < 60){
            return $runtime . ' minutes';
        } else {
            $h = intval($runtime/60);
            $min = $runtime%60;

            // if ($h == 1 && $min == 1){
            //     return $h . ' hour ' . $min . ' minute';
            // } else if ($h == 1 && $min != 1){
            //     return $h . ' hour ' . $min . ' minutes';
            // } else if ($h != 1 && $min == 1){
            //     return $h . ' hours ' . $min . ' minute';
            // } else {
            //     return $h . ' hours ' . $min . ' minutes';
            // }

            return $h . ( ($h == 1) ? ' hour' : ' hours' ) . ' ' . $min . ( ($min == 1) ? ' minute' : ' minutes' );

        }

    };

    
    function check_old_movie($movie_birth){
        $current_year = date("Y");
        $movie_age = $current_year - $movie_birth;
        if ($movie_age > 40 && $movie_birth){
            return '<span class = "badge bg-warning text-dark">Old movie: '. $movie_age . ' years</span>';
        } else return false;
    }

        
    function find_movie_by_id($item){
        if(!isset($_GET['movie_id'])) return false;

        if($item['id'] === intval($_GET['movie_id'])){
            return true;
        } else {
            return false;
        }
    }

    
    function find_movie_by_title($item){
        if(stripos($item['title'], $_GET['s']) === false){
            return false;
        } else {
            return true;
        }
    }


?>