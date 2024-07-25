<?php
class Math{
    public static function wurzel($wert){
        return sqrt($wert);  
    }
    public static function absolut($wert){
        return abs($wert);
    }
}

Math::wurzel(4);
Math::absolut(541);