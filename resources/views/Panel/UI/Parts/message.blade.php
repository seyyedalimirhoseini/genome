<?php



if (Session::get('msg')) {
    echo '<p class="alert alert-success">';
    echo Session::get('msg');
    echo '</p>';

    Session::put('msg',null);
}
?>
