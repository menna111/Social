<?php



function is_active($routname){
    return  request()->segment(2) != null && request()->segment(2) == $routname ? 'active' : '' ;
}
