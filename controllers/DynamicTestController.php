<?php defined('RPGMAKERES') OR exit();
/*
 * This file is part of RPG Maker ES Core
 * (c) RPG Maker ES community.
 * This code is licensed under MIT license (see LICENSE for details)
*/

/**
 * Class DynamicTestController
 * This is just a test controller for dynamic pages :D
 */
class DynamicTestController
{
    static function _getWebPath() {
        return "dynamic/";
    }

    /**
     * Return the default method of this controller
     * @return array
     */
    static function _getDefault()
    {
        return ["testFunction", null];
    }

    /**
     * Return all possible children of this controller. Can be dynamic.
     * @return array
     */
    static function _getChildren()
    {
        //returns an array of keyvalue-array-objects with 3 properties: URL-name, Method name and a parameter (optional, null if not)
        return [
            ["database", "databaseTest", null],
            ["ajustes", "ajustes", null]
        ];
    }

    /**
     * This is just a test function that serves /public/route1
     * @return false|string
     * @throws Exception
     */
    static function testFunction()
    {
        ViewProcessor::sendHTMLHeaders();
        ViewProcessor::setSkinHeadTitle("Dynamic view test");

        //RPGMakerES::loadCore("WebGenerator");
        //WebGenerator::deleteRoute(DynamicTestController::_getWebPath() . "toBeDeleted");

        return ViewProcessor::renderHTMLWithSkin("rpgmakeres.php",
            "testView.php", [
            "title" => "Hello world!",
            "second_text" => "I'm rendering a dynamic view!"
        ]);
    }

    static function ajustes() {
        ViewProcessor::sendHTMLHeaders();
        return ViewProcessor::renderHTMLWithSkin("rpgmakeres.php", "ajustes.php", []);
    }

    static function databaseTest()
    {

        //$out = DBService::getSecureQuery("SELECT * FROM cosa WHERE id=?", "i", [2]);
        //$out = DBService::execQuery("INSERT INTO cosa VALUES(4,4)");
        //DBService::disconnect();

        //$out = PDOService::testDBConnection();

        RPGMakerES::loadService("db_pdo");
        //$out = PDOService::getSecureQuery("SELECT * FROM cosa WHERE id=?", [PDO::PARAM_INT], [2]);
        //$out = PDOService::execQuery("INSERT INTO cosa VALUES(4,4)");
        $out = PDOService::getQuery("SELECT * FROM cosa WHERE id=1");
        return nl2br(var_export($out));

    }

}
