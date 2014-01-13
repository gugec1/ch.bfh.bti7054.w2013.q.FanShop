<?php
global $db;
require_db();
//Datenbankabfragen zum Hinzufügen, Bearbeiten und Löschen der Daten
//todo: in Backend integrieren

//Kategorie

//..hinzufügen
//INSERT INTO `fanshop`.`categorie` (`id`, `name`) VALUES (NULL, 'men')

//..entfernen
// DELETE FROM `fanshop`.`categorie` where id = '1'


//Produkt 
//front: 1->auf Startseite, 0->nicht auf Startseite
//changeableSize: 1->Kleidergrössenwahl wird angezeigt

//INSERT INTO `fanshop`.`products` (`id`, `bezeichnung_de`, `bezeichnung_en`, `preis`, `beschreibung_de`, `beschreibung_en`, `bild`, `front`, `changeableSize`) VALUES (NULL, 'Pin', 'Pin', '5', 'Beschreibung deutsch', 'Beschreibung englisch', 'pin.jpg', '0', '0');

//UPDATE `products` SET `id`=[value-1],`bezeichnung_de`=[value-2],`bezeichnung_en`=[value-3],`preis`=[value-4],`beschreibung_de`=[value-5],`beschreibung_en`=[value-6],`bild`=[value-7],`front`=[value-8],`changeableSize`=[value-9] WHERE 1

//DELETE FROM `products` WHERE id = '1'



//Zuweisung Produkt in Kategorie
//INSERT INTO `fanshop`.`product_categorie` (`product_id`, `categorie_id`) VALUES ('18', '13');

//....

?>
