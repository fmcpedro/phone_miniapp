<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BrandRepository extends EntityRepository{
    
    public function findPhonesByBrand($brandId){
        $em=$this->getEntityManager();
        $query=$em->createQuery('SELECT p FROM AppBundle:Phone p WHERE p.brand = ?1');
        $query->setParameter(1, $brandId);
    return $query->getResult();
        
    }
    
    
    public function findAllBrands(){
        $em=$this->getEntityManager();
        $query=$em->createQuery('SELECT p FROM AppBundle:Phone p WHERE p.brand = ?1');
        
    }
    
    
    
}
