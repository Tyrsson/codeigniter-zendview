<?php
$this->doctype('XHTML11');
?>

    <?php
        echo $this->pod(
                $this->podData,
                array('tag' => 'div', 'id' => 'menuPod', 'class' => 'menuPodClass'),
                array('ulClass' => 'classForUl'),
                true,
                array('tag' => 'h2', 'podHeading' => 'Pages', 'class' => 'headingCssClass')
        );
    ?>
