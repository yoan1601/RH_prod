<?php
    function getGenreName($codeGenre){
        if($codeGenre==1){
            return "Homme";
        }
        return "Femme";
    }
    function getBooleanValue($oui_non){
        if($oui_non==1){
            return "Oui";
        }
        return "Non";
    }
?>