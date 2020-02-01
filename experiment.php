<?php
include_once 'script.php';

if (isset($_POST['text_id'])) {
    $text_id = $_POST['text_id'];
    $box_id = $_POST['box_id'];
    echo "offfff";
    echo "<p>" . $text_id . "</p>";
}
isLoggedIn();
$sequenceArray = explode (",", mysqli_fetch_assoc(mysqli_query($DataBase,"SELECT variant FROM variants WHERE variant_id='".$_SESSION['variant']."'"))['variant']);
?>
<!DOCTYPE html>
<html>
	<head>
        <title> Experiment </title>
        <link rel="stylesheet" type="text/css" href="experimentStyle.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="experimentJS.js"></script>
	</head>
	<body>
    <?php
    /*if (isset($_POST['text_id'])) {
        $text_id = $_POST['text_id'];
        $box_id = $_POST['box_id'];
        echo "offfff";
        echo "<p>" . $text_id . "</p>";
    }*/
    ?>
		<div id="texts">
            <a class="text" href="#first-text">
                <div id="text1" style="overflow: hidden;">
                    <p <?php echo "id=" . $sequenceArray[0]?> draggable="true" ondragstart="drag(event); selectText(this);">
                        <?php echo getTextS($sequenceArray[0]);?>
                    </p>
                </div>
            </a>
            <div class="text-target" id="first-text" >
                <div>
                    <?php echo getTextS($sequenceArray[0]);?>
                </div>
                <a class="text-close" href="#"></a>
            </div>

            <a class="text" href="#second-text">
                <div id="text2">
                    <p <?php echo "id=" . $sequenceArray[1]?> draggable="true" ondragstart="drag(event); selectText(this);">
                        <?php echo getTextS($sequenceArray[1]);?>
                    </p>
                </div>
            </a>
            <div class="text-target" id="second-text">
                <div>
                    <?php echo getTextS($sequenceArray[1]);?>
                </div>
                <a class="text-close" href="#"></a>
            </div>

            <a class="text" href="#third-text">
                <div id="text3">
                    <p <?php echo "id=" . $sequenceArray[2]?> draggable="true" ondragstart="drag(event); selectText(this);">
                        <?php echo getTextS($sequenceArray[2]);?>
                    </p>
                </div>
            </a>
            <div class="text-target" id="third-text">
                <div>
                    <?php echo getTextS($sequenceArray[2]);?>
                </div>
                <a class="text-close" href="#"></a>
            </div>

            <a class="text" href="#fourth-text">
                <div id="text4">
                    <p <?php echo "id=" . $sequenceArray[3]?> draggable="true" ondragstart="drag(event); selectText(this);">
                        <?php echo getTextS($sequenceArray[3]);?>
                    </p>
                </div>
            </a>
            <div class="text-target" id="fourth-text" >
                <div>
                    <?php echo getTextS($sequenceArray[3]);?>
                </div>
                <a class="text-close" href="#"></a>
            </div>

            <a class="text" href="#fifth-text">
                <div id="text5">
                    <p <?php echo "id=" . $sequenceArray[4]?> draggable="true" ondragstart="drag(event); selectText(this);">
                        <?php echo getTextS($sequenceArray[4]);?>
                    </p>
                </div>
            </a>
            <div class="text-target" id="fifth-text">
                <div>
                    <?php echo getTextS($sequenceArray[4]);?>
                </div>
                <a class="text-close" href="#"></a>
            </div>

            <a class="text" href="#sixth-text">
                <div id="text6">
                    <p <?php echo "id=" . $sequenceArray[5]?> draggable="true" ondragstart="drag(event); selectText(this);">
                        <?php echo getTextS($sequenceArray[5]);?>
                    </p>
                </div>
            </a>
            <div class="text-target" id="sixth-text">
                <div>
                    <?php echo getTextS($sequenceArray[5]);?>
                </div>
                <a class="text-close" href="#"></a>
            </div>

            <a class="text" href="#seventh-text">
                <div id="text7">
                    <p <?php echo "id=" . $sequenceArray[6]?> draggable="true" ondragstart="drag(event); selectText(this);">
                        <?php echo getTextS($sequenceArray[6]);?>
                    </p>
                </div>
            </a>
            <div class="text-target" id="seventh-text">
                <div>
                    <?php echo getTextS($sequenceArray[6]);?>
                </div>
                <a class="text-close" href="#"></a>
            </div>

            <a class="text" href="#eighth-text">
                <div id="text8">
                    <p <?php echo "id=" . $sequenceArray[7]?> draggable="true" ondragstart="drag(event); selectText(this);">
                        <?php echo getTextS($sequenceArray[7]);?>
                    </p>
                </div>
            </a>
            <div class="text-target" id="eighth-text" >
                <div>
                    <?php echo getTextS($sequenceArray[7]);?>
                </div>
                <a class="text-close" href="#"></a>
            </div>
		</div>

        <div id="boxes">
            <div id="box1" ondrop="selectBox(this); drop(event);" ondragover="allowDrop(event)"></div>
            <div id="box2" ondrop="selectBox(this); drop(event);" ondragover="allowDrop(event)"></div>
            <div id="box3" ondrop="selectBox(this); drop(event);" ondragover="allowDrop(event)"></div>
            <div id="box4" ondrop="selectBox(this); drop(event);" ondragover="allowDrop(event)"></div>
            <div id="box5" ondrop="selectBox(this); drop(event);" ondragover="allowDrop(event)"></div>
        </div>
        <form action="/action_page.php">
            <div class="buttonContainer">
                <input type="submit" value="Submit">
            </div>
        </form>

	</body>
</html>