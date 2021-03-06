<?php

class UnitShashinAlbumRefData extends UnitTestCase {
    private $expectedRefData = array(
        'id' => array(
            'db' => array(
                'type' => 'smallint unsigned',
                'not_null' => true,
                'primary_key' => true,
                'other' => 'AUTO_INCREMENT')),
        'sourceId' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '255',
                'not_null' => true,
                'unique_key' => true),
            'picasa' => array('gphoto$id', '$t'),
            'twitpic' => array('twitter_id'),
            'youtube' => array('id', '$t')),
        'albumType' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '20',
                'not_null' => true)),
        'dataUrl' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '255',
                'not_null' => true),
            'picasa' => array('link', 0, 'href'),
            'youtube' => array('id', '$t'),
            'input' => array(
                'type' => 'text',
                'size' => 100)),
        'user' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '255',
                'not_null' => true),
            'picasa' => array('gphoto$user', '$t'),
            'twitpic' => array('username'),
            'youtube' => array('author', 0, 'name', '$t')),
        'name' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '255',
                'not_null' => true),
            'picasa' => array('gphoto$nickname', '$t'),
            'twitpic' => array('name'),
            'youtube' => array('author', 0, 'name', '$t')),
        'linkUrl' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '255',
                'not_null' => true),
            'picasa' => array('link', 1, 'href'),
            'youtube' => array('link', 1, 'href')),
        'title' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '255',
                'not_null' => true),
            'picasa' => array('title', '$t'),
            'youtube' => array('title', '$t')),
        'description' => array(
            'db' => array(
                'type' => 'text'),
            'picasa' => array('subtitle', '$t')),
        'location' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '255'),
            'picasa' => array('gphoto$location', '$t'),
            'twitpic' => array('location')),
        'coverPhotoUrl' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '255'),
            'picasa' => array('icon', '$t'),
            'twitpic' => array('avatar_url'),
            'youtube' => array('logo', '$t')),
        'width' => array(
            'db' => array(
                'type' => 'smallint unsigned')),
        'height' => array(
            'db' => array(
                'type' => 'smallint unsigned')),
        'lastSync' => array(
            'db' => array(
                'type' => 'int unsigned')),
        'photoCount' => array(
            'db' => array(
                'type' => 'smallint unsigned',
                'not_null' => true),
            'picasa' => array('gphoto$numphotos', '$t'),
            'twitpic' => array('photo_count'),
            'youtube' => array('openSearch$totalResults', '$t')),
        'pubDate' => array(
            'db' => array(
                'type' => 'int unsigned',
                'not_null' => true),
            'picasa' => array('gphoto$timestamp', '$t'),
            'twitpic' => array('timestamp'),
            'youtube' => array('updated', '$t')),
        'geoPos' => array(
            'db' => array(
                'type' => 'varchar',
                'length' => '25'),
            'picasa' => array('georss$where', 'gml$Point', 'gml$pos', '$t')),
        'includeInRandom' => array(
            'db' => array(
                'type' => 'char',
                'length' => '1',
                'other' => "default 'Y'"),
            'input' => array(
                'type' => 'radio',
                'subgroup' => array('Y' => 'Yes', 'N' => 'No'))),
    );

    public function __construct() {
        $this->UnitTestCase();
    }

    public function setUp() {
    }

    public function testGetRefData() {
        $albumRefData = new Lib_ShashinAlbumRefData();
        $refData = $albumRefData->getRefData();
        $this->assertEqual($refData, $this->expectedRefData);
    }
}