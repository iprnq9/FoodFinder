<?php

function formSuccess($val) {
    echo "<div class=\"valign-wrapper\"><i class=\"material-icons small valign\">done</i>&nbsp;$val&nbsp;updated successfully!</div>";
}

function formFail($val) {
    echo "<div class=\"valign-wrapper\"><i class=\"material-icons small valign\">error_outline</i>Error:&nbsp;$val&nbsp;was not updated successfully. If the error persists
contact a nerd. </div>";
}

function fileError($val) {
    echo "<div class=\"valign-wrapper\"><i class=\"material-icons small valign\">error_outline</i>$val&nbsp;If the error persists contact a nerd.</div>";
}

function cardActionSuccess($val) {
    echo "<div class=\"valign-wrapper\"><i class=\"material-icons small valign\">done</i>&nbsp;$val</div>";
}

function cardActionFail($val) {
    echo "<div class=\"valign-wrapper\"><i class=\"material-icons small valign\">error_outline</i>$val&nbsp;If the error persists contact a nerd.</div>";
}

?>