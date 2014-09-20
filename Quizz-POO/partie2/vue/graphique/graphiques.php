
<?php

for ($i = 0, $d = 1; $i < 3, $i < 3; $i++, $d++) {
    
?>
	<h2><?php
    echo $d . '. ' . ($tabs_categ[$i]);
?></h2>
	<div class="categorie">
		
		<div class="colonne">
			<?php
    for ($j = 1; $j < count($reponses[$i]) + 1; $j++) {
        
        echo '<p> Réponse :' . $j . '</p>';
    }
?>
		</div>
		<div class="colonne">
			<?php
    $x = $reponses[0];
    for ($j = 0; $j < count($reponses[$i]); $j++) {
        
        echo '<p> [' . implode($reponses[$i][$j]) . ' % Réussite] :</p>';
    }
?>
		</div>
		<div class="colonne">
			<?php
    for ($j = 0; $j < count($total_repondu[$i]); $j++) {
        
        echo '<p> ' . implode($total_repondu[$i][$j]) . ' | Répendants :</p>';
    }
?>
		</div>
		<div class="image-gd">
			<img src=<?php
    echo "./images/image" . $i . ".png";
?> alt="image">
		</div>

	</div>
<?php
    
}

?>
