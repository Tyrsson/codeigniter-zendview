<?php
$this->doctype('XHTML11');
?>
<div class="testing">
    <?php
        echo $this->testVar;
        //echo $this->myHelper('Some content for the pod');
        echo $this->pod($this->podData, array('tag' => 'div', 'id' => 'menuPod', 'class' => 'menuPodClass'), array('ulClass' => 'classForUl'), true);
    ?>
</div>