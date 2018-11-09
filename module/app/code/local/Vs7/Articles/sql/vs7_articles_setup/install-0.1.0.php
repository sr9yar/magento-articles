<?php

    // CREATE TABLE `root`.`ma_vs7_article` (
    //     `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    //     `title` TEXT NULL,
    //     `text` LONGTEXT NULL,
    //     `image` TEXT NULL,
    //     `active` TINYINT NULL DEFAULT 1,
    //     PRIMARY KEY (`id`));




    // INSERT INTO `root`.`ma_vs7_article` (`id`, `title`, `text`, `image`, `active`) VALUES ('1', 'article 1', 'Schlenkerla Rauchbier, a traditional smoked beer, being poured from a cask\nBeer is one of the oldest[1][2][3] and most widely consumed[4] alcoholic drinks in the world, and the third most popular drink overall after water and tea.[5] Beer is brewed from cereal grains—most commonly from malted barley, though wheat, maize (corn), and rice are also used. During the brewing process, fermentation of the starch sugars in the wort produces ethanol and carbonation in the resulting beer.[6] Most modern beer is brewed with hops, which add bitterness and other flavours and act as a natural preservative and stabilizing agent. Other flavouring agents such as gruit, herbs, or fruits may be included or used instead of hops. In commercial brewing, the natural carbonation effect is often removed during processing and replaced with forced carbonation.[7]\n\nSome of humanity\'s earliest known writings refer to the production and distribution of beer: the Code of Hammurabi included laws regulating beer and beer parlours,[8] and \"The Hymn to Ninkasi\", a prayer to the Mesopotamian goddess of beer, served as both a prayer and as a method of remembering the recipe for beer in a culture with few literate people.[9][10]\n\nBeer is distributed in bottles and cans and is also commonly available on draught, particularly in pubs and bars. The brewing industry is a global business, consisting of several dominant multinational companies and many thousands of smaller producers ranging from brewpubs to regional breweries. The strength of modern beer is usually around 4% to 6% alcohol by volume (ABV), although it may vary between 0.5% and 20%, with some breweries creating examples of 40% ABV and above.[11]\n\nBeer forms part of the culture of many nations and is associated with social traditions such as beer festivals, as well as a rich pub culture involving activities like pub crawling and pub games.', 'https://static.standard.co.uk/s3fs-public/thumbnails/image/2017/06/05/10/the-agenda-10-87.jpg?w340', '1');
    // INSERT INTO `root`.`ma_vs7_article` (`id`, `title`, `text`, `image`, `active`) VALUES ('2', 'huiarticle 2', 'Beer is one of the world\'s oldest prepared drinks. The earliest archaeological evidence of fermentation consists of 13,000 year old residues of a beer with the consistency of gruel, used by the semi-nomadic Natufians for ritual feasting, at the Raqefet Cave in the Carmel Mountains near Haifa in Israel.[12][13] There is evidence that beer was produced at Göbekli Tepe during the Pre-Pottery Neolithic (around 8500 BC to 5500 BC).[14] The earliest clear chemical evidence of beer produced from barley dates to about 3500–3100 BC, from the site of Godin Tepe in the Zagros Mountains of western Iran.[15][16] It is possible, but not proven, that it dates back even further — to about 10,000 BC, when cereal was first farmed.[17] Beer is recorded in the written history of ancient Iraq and ancient Egypt,[18] and archaeologists speculate that beer was instrumental in the formation of civilizations.[19] Approximately 5000 years ago, workers in the city of Uruk (modern day Iraq) were paid by their employers in beer.[20] During the building of the Great Pyramids in Giza, Egypt, each worker got a daily ration of four to five litres of beer, which served as both nutrition and refreshment that was crucial to the pyramids\' construction.[21]\n\nSome of the earliest Sumerian writings contain references to beer; examples include a prayer to the goddess Ninkasi, known as \"The Hymn to Ninkasi\",[22] which served as both a prayer as well as a method of remembering the recipe for beer in a culture with few literate people, and the ancient advice (Fill your belly. Day and night make merry) to Gilgamesh, recorded in the Epic of Gilgamesh, by the ale-wife Siduri may, at least in part, have referred to the consumption of beer.[23] The Ebla tablets, discovered in 1974 in Ebla, Syria, show that beer was produced in the city in 2500 BC.[24] A fermented drink using rice and fruit was made in China around 7000 BC. Unlike sake, mold was not used to saccharify the rice (amylolytic fermentation); the rice was probably prepared for fermentation by chewing or malting.[25][26]\n\nAlmost any substance containing sugar can naturally undergo alcoholic fermentation. It is likely that many cultures, on observing that a sweet liquid could be obtained from a source of starch, independently invented beer. Bread and beer increased prosperity to a level that allowed time for development of other technologies and contributed to the building of civilizations.[27][28][29][30]\n\nXenophon noted that during his travels, beer was being produced in Armenia.[31]\n\n\nFrançois Jaques: Peasants Enjoying Beer at Pub in Fribourg (Switzerland, 1923)\nBeer was spread through Europe by Germanic and Celtic tribes as far back as 3000 BC,[32] and it was mainly brewed on a domestic scale.[33] The product that the early Europeans drank might not be recognised as beer by most people today. Alongside the basic starch source, the early European beers might contain fruits, honey, numerous types of plants, spices and other substances such as narcotic herbs.[34] What they did not contain was hops, as that was a later addition, first mentioned in Europe around 822 by a Carolingian Abbot[35] and again in 1067 by abbess Hildegard of Bingen.[36]', 'https://static.standard.co.uk/s3fs-public/thumbnails/image/2017/06/05/10/the-agenda-10-87.jpg?w340', '1');


$this->startSetup();


$table = new Varien_Db_Ddl_Table();

$table->setName($this->getTable('vs7_article'));

$table->addColumn(
    'id',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    10,
    array(
        'auto_increment' => true,
        'unsigned' => true,
        'nullable'=> false,
        'primary' => true
    )
);

$table->addColumn(
    'title',
    Varien_Db_Ddl_Table::TYPE_TEXT,
    null,
    array(
        'nullable' => true,
    )
);

$table->addColumn(
  'text',
  Varien_Db_Ddl_Table::TYPE_TEXT,
  null,
  array(
      'nullable' => true,
  )
);


$table->addColumn(
  'image',
  Varien_Db_Ddl_Table::TYPE_TEXT,
  null,
  array(
      'nullable' => true,
  )
);

$table->addColumn(
    'active',
    Varien_Db_Ddl_Table::TYPE_BOOLEAN,
    null,
    array(
        'nullable' => false,
        'default' => true,
    )
);


$table->setOption('type', 'InnoDB');
$table->setOption('charset', 'utf8');

$this->getConnection()->createTable($table);

$this->endSetup();


// --------------------------------------------
// seeding the db
// try this out later

// $articles = array(
//     array(
//         'title' => 'Title 1 ',
//         'text' => 'Description 1 Description 1 Description Description Description',
//     ),
//     array(
//         'title' => 'Title 2',
//         'text' => 'Description 2 Description 2 Description 2 Description 2 Description',
//     ),
// );
 
// foreach ($articles as $article) {
//     Mage::getModel('vs7_articles/article')
//         ->setData($article)
//         ->save();
// }