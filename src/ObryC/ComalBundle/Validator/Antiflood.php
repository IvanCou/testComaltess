<?php
namespace ObryC\ComalBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Antiflood extends Constraint
{
  public $message = "Vous avez déjà envoyé un mail il y a moins de 15 secondes, merci d'attendre un peu.";
}