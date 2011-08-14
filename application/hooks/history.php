<?php

// automatically load the history library before the
// controller action is executed and then automatically
// push the page into the history cache after the action
// has executed.

function setup_history() {
    $ci = get_instance();
    $ci->load->library('history');
}
function push_history() {
    $ci = get_instance();
    $ci->history->push($ci->uri->uri_string());
} 