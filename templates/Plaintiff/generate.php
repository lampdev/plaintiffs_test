<?php
use App\Controller\PlaintiffController;
?>

<?php echo $plaintiffsGreeting; ?> <?php echo PlaintiffController::getVerbEndingForCount('bring', count($plaintiffs))?> this action seeking to enforce
<?php echo PlaintiffController::getPronoun('Plaintiff',count($plaintiffs)); ?> right to privacy under the consumer-privacy provisions of the Telephone Consumer Protection Act (“TCPA”), 47 U.S.C. § 227.

<?php echo $defendantsGreeting; ?> violated the TCPA by using an automated dialing system, or “ATDS”, to send telemarketing text messages to <?php echo PlaintiffController::getPronoun('Plaintiff', count($plaintiffs)); ?>
cellular telephone <?php echo PlaintiffController::getNounEndingForCount('number', count($plaintiffs)) ?> for the purposes of advertising <?php echo PlaintiffController::getPronoun('Defendant', count($defendants)); ?>
goods and services. Further violating the TCPA, <?php echo $defendantsGreeting; ?> sent multiple text messages to <?php echo $plaintiffsGreeting; ?> despite <?php echo PlaintiffController::getPronoun('Plaintiff', count($plaintiffs)); ?>
presence on the National Do Not Call Registry, and without maintaining internal do not call procedures as required by law.   |Lastly|Also, the text messages violated the Utah Truth In Advertising Act.

