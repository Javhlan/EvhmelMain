<?php
include 'point.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of line
 *
 * @author Javhlan
 */
class Line {
    //put your code here
    var $Start;
    var $End;
    public function __construct($startX, $startY, $endX, $endY) {
        $this->Start = new Point($startX, $startY);
        $this->End = new Point($endX, $endY);
    }
}
