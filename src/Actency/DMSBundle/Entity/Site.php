<?php
// src/Actency/DMSBundle/Entity/Site.php
namespace Actency\DMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Actency\DMSBundle\Entity\SiteRepository")
 * @ORM\Table(name="site")
 */
class Site
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="SiteGroup", inversedBy="sites")
     * @ORM\JoinColumn(name="sitegroup_id", referencedColumnName="id")
     */
    protected $sitegroup;

  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $url;

    /**
     * @ORM\Column(type="string", length=16)
     */
    protected $secret;
    
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
   * Set url
   *
   * @param string $url
   * @return Site
   */
  public function setUrl($url)
  {
      $this->url = $url;

      return $this;
  }

  /**
   * Get url
   *
   * @return string
   */
  public function getUrl()
  {
      return $this->url;
  }

    /**
     * Set secret
     *
     * @param string $secret
     * @return Site
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * Get secret
     *
     * @return string 
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Set sitegroup
     *
     * @param \Actency\DMSBundle\Entity\SiteGroup $sitegroup
     * @return Site
     */
    public function setSitegroup(\Actency\DMSBundle\Entity\SiteGroup $sitegroup = null)
    {
        $this->sitegroup = $sitegroup;

        return $this;
    }

    /**
     * Get sitegroup
     *
     * @return \Actency\DMSBundle\Entity\SiteGroup 
     */
    public function getSitegroup()
    {
        return $this->sitegroup;
    }
}
