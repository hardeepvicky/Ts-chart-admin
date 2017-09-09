<?php

$list = array(
    "eng" => "English",
    "ita" => "Italian"
);

if (!$language)
{
    $language = "eng";
}

?>

<style>
    .language-block
    {
        position: absolute;
        top : 0;
        left : 0;
        background-color: #EEE;
        z-index: 100;   
        padding-left: 15px;
    }

    .language-block a
    {
        display: inline-block;
        padding: 8px 15px;
        color : #000 !important;
    }
    
    .language-block #language-list
    {
        position: absolute;
        background-color: #EEE;
        list-style: none;
        padding : 0;
        margin : 0;
        right : 0;
    }

    .language-block #language-list li
    {
        padding : 0;
        margin : 0;
    }

    .language-block #language-list li a
    {
        color:#000;                
    }

    .language-block a:hover
    {
        background-color: #CCC;
        text-decoration: none;
    }
</style>

<div class="language-block">
    <i class="fa fa-language"></i>
    <a href="javascript:void(0);" class="css-toggler" data-toggler-target=".language-block #language-list" data-toggler-class="hidden">        
        <?= $list[$language] ?>
        <i class="fa fa-angle-down"></i>
    </a> 
    <ul id="language-list" class="hidden">
        <?php foreach($list as $lang => $text):
                if ($lang == $language)
                {
                    continue;
                }
            ?>
            <li>
                <a href="/users/language/<?= $lang ?>"><?= $text ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>