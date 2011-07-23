<form method="POST" action="#">
xsd: <br />
<textarea style="width: 100%; height: 100px;" name="xsd"><?php echo isset($_POST['xsd']) ? $_POST['xsd'] : ''; ?></textarea>
<br />
<br />
xml: <br />
<textarea style="width: 100%; height: 100px;" name="xml"><?php echo isset($_POST['xml']) ? $_POST['xml'] : ''; ?></textarea>
<br />
<input type="submit" />

</form>

<?php
if(isset($_POST['xml']) && isset($_POST['xsd'])){
    $xmlString = $_POST['xml'];
    libxml_use_internal_errors(true);

    /* creating a DomDocument object */
    $objDom = new DomDocument();

    /* loading the xml data */
    $objDom->loadXML($xmlString);

    /**
    * if you want to use a xml file instead of a string, it can be loaded like this:
    * $objDom->load("path/to/xml");
    */

    /* tries to validade your data */
    if (!$objDom->schemaValidateSource($_POST['xsd'])) {
    /* if anything goes wrong you can get all errors at once */
    $allErrors = libxml_get_errors();
    /* each element of the array $allErrors will be a LibXmlError Object */

    ?>
    <textarea style="width: 100%; height: 200px;"><?php print_r($allErrors); ?></textarea>
    <?php
    } else {
    echo "xml validates!";
    }
}

?>
