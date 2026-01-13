<?php

class XSATools{

    use Cart, Categories,Post;
}

$xsa_tools = new XSATools();
var_dump($xsa_tools->get_categories_by("category"));