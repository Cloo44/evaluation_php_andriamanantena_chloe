<?php

// fonction de nettoyage

function sanitize(string $value) : string {    
    return htmlspecialchars(strip_tags(trim($value)), ENT_NOQUOTES);
}