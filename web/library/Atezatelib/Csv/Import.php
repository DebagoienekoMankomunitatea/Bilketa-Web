<?php
use Atezate\Model\Contribuyentes as ContactsModel;
use Atezate\Mapper\Sql\Contacts as ContactsMapper;

class Atezatelib_Csv_Import
{
    public function import($csv)
    {
        $fp = fopen ( $csv->fetchCsv()->getFilePath() , "r" );
        
        $count = 0;
        
        
        while (( $data = fgetcsv ( $fp , 1000 , "," )) !== FALSE ) { // Mientras hay líneas que leer...
            
            $i = 0;
            
            $datos = array();
            
            foreach($data as $row) {
                if ($count != 0) {
                    $datos[] = $row;
                }
            }
            
            if (count($datos) > 2) {
                $name = $datos[0];
                $surnames = $datos[1];
                $email = $datos[2];
                $companyCif = $data[3];
                
                $contactsMapper = new ContactsMapper();
                
                $contact = $contactsMapper->findOneByField(array('email','brandId'),array($email,$csv->getBrandId()));
                
                if(!$contact) {
                    $contactsModel = new ContactsModel();
                    
                    $contactsModel->setName($name);
                    $contactsModel->setSurnames($surnames);
                    $contactsModel->setEmail($email);
                    
                    if ($companyCif != '') {
                        
                        $companiesMapper = new CompaniesMapper();
                        
                        $company = $companiesMapper->findOneByField(array('CIF','brandId'),array($companyCif,$csv->getBrandId()));
                        
                        if ($company) {
                            
                            $contactsModel->setCompanyId($company->getId());
                            
                        } else {
                            
                            $companiesModel = new CompaniesModel();
                            $companiesModel->setCIF($companyCif);
                            $companiesModel->setBrandId($csv->getBrandId());
                            $companiesModel->setActive('0');
                            
                            $companiesModel->save();
                            
                            $contactsModel->setCompanyId($companiesModel->getId());
                        }
                    }
                    
                    $contactsModel->setActive('1');
                    $contactsModel->setBrandId($csv->getBrandId());
                    $contactsModel->save();
                    
                }
                
            }
            $count++;
        }
        
        fclose ( $fp );
        
        return true;
    }
}