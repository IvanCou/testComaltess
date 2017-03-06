<?php

namespace ObryC\ComalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Mail
 *
 * @ORM\Table(name="mail")
 * @ORM\Entity(repositoryClass="ObryC\ComalBundle\Repository\MailRepository")
 */
class Mail
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=255, nullable=false)
	 * @Assert\Length(min=5, minMessage="Le sujet du mail doit faire minimum 5 caractères")
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=2500, nullable=false)
	 * @Assert\Length(min=10, minMessage="Le message du mail doit faire minimum 10 caractères")
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_src", type="string", length=255, nullable=false)
	 * @Assert\NotBlank()
	 * @Assert\Email()
     */
    private $mailSrc;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sujet
     *
     * @param string $sujet
     * @return Mail
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string 
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Mail
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set mailSrc
     *
     * @param string $mailSrc
     * @return Mail
     */
    public function setMailSrc($mailSrc)
    {
        $this->mailSrc = $mailSrc;

        return $this;
    }

    /**
     * Get mailSrc
     *
     * @return string 
     */
    public function getMailSrc()
    {
        return $this->mailSrc;
    }
}
