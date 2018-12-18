<?php
/**
 * Created by PhpStorm.
 * User: ban
 * Date: 2018-12-17
 * Time: 14:31
 */

require_once('includes/config.php');

$data = json_decode(file_get_contents('php://input'), true);

var_dump($data);


$stmt = $db->prepare('INSERT INTO articles (docid,authors,thumbid,title) VALUES (:docid, :authors, :thumbid, :title)');
$stmt->execute(array(
    ':title' => json_encode($data['title']),
    ':authors' => json_encode($data['author']),
    ':thumbid' => $data['thumbid'],
    ':docid' => $data['docid']
));
