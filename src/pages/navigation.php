
<?php
//Navigationsmenü

$menuItems = array(
    "startseite" => array("de" => "Home", "en" => "Home"),
    "neu" => array("de" => "Neu", "en" => "New"),
    "mannschaft" => array("de" => "Mannschaft", "en" => "Team"),
    "damen" => array("de" => "Damen", "en" => "Women"),
    "herren" => array("de" => "Herren", "en" => "Men"),
    "kinder" => array("de" => "Kinder", "en" => "Kids"),
    "fanartikel" => array("de" => "Fanartikel", "en" => "Accessoires")
);
?>

<ul>
    <li><a href="index.php?seite=startseite"><?php echo $menuItems["startseite"][$lang]?></a></li>
    <li><a href="index.php?seite=team"><?php echo $menuItems["mannschaft"][$lang]?></a>
<!--        <ul>
            <li><a href="">Test1</a></li>
            <li><a href="">Test2</a></li>
        </ul>-->
    </li>
    <li><a href="index.php?seite=women"><?php echo $menuItems["damen"][$lang]?></a>
    <li><a href="index.php?seite=men"><?php echo $menuItems["herren"][$lang]?></a>

    <li><a href="index.php?seite=kids"><?php echo $menuItems["kinder"][$lang]?></a></li>
    <li><a href="index.php?seite=accessoires"><?php echo $menuItems["fanartikel"][$lang]?></a></li>
    
</ul>