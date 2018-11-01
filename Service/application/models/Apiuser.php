<?php
class apiuser extends CI_Model
{
    public function demo()
    {
        return true;
    }
    public function addenquiry($data)
    {
        $res = $this->db->insert('enquiry',$data);
        if($res)
            return true;
        else
            return false;
    }
     public function getads()
    {
        $query = $this->db->query("SELECT mem_id,imagelink FROM `imgads` WHERE is_deleted='false'");
        if($query->num_rows())
        {
             $res=$query->result();
            $ads=array();
            shuffle($res);
            if(sizeof($res)>=5)
                $n=5;
            else
                $n=sizeof($res);
            $ads=array_rand($res,$n);
            $ad=array();
            if(is_array($ads))
            {
                foreach ($ads as $key => $value) {
                array_push($ad,$res[$value]);
                }
            }else
            {
               array_push($ad,$res[0]); 
            }
            
            return $ad;
        }
        else
            return false;
    }

    public function getcontentlist($menuid)
    {
        $res=$this->db->query('select items.item_id,items.title,items.imagelink,items.is_video,items.date,menus.menu_name from items join menus on items.menu_id = menus.menu_id where items.is_deleted="false" and menus.is_deleted="false" and items.menu_id='.$menuid.' ORDER BY  STR_TO_DATE(date, "%d-%m-%Y" ) DESC ');
        $result = $res->result();

        if ($result)
        {
             foreach ($result as $news) {
               // return $news->title;
               if($news->is_video=="1")
               {
                    $news->title="Video/".$news->title;
               }
                }
            return $result;
        }
        else
            return false;

    }


    public function getheadings($menuid)
    {
        $res=$this->db->query('select items.item_id,items.title,items.is_video,items.date,menus.menu_name from items join menus on items.menu_id = menus.menu_id where items.is_deleted="false" and menus.is_deleted="false" and items.menu_id='.$menuid.' ORDER BY  STR_TO_DATE(date, "%d-%m-%Y" ) DESC limit 5');
        $result = $res->result();

        if ($result)
        {
            $res1=array();
            for($i=0;$i<sizeof($result);$i++)
            {
                array_push($res1,$result[$i]->title);
            }
            return $res1;
        }
        else
            return false;

    }


    public function getmenus()
    {
        $query=$this->db->query('select menu_id,menu_name from menus WHERE is_deleted="false" and menu_id NOT IN (1,2,3)');
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }

    public function getcontent($itemid)
    {
        $detail=array();
        
          $res=$this->db->query('select items.item_id,items.title,items.description,items.imagelink,items.is_video,items.videolink,items.date,menus.menu_name from items join menus on items.menu_id = menus.menu_id where items.is_deleted="false" and menus.is_deleted="false" and items.item_id='.$itemid.' limit 10 ');
        $result = $res->result();

        if ($result)
             $detail["detailcontent"]=$result;
        else
             $detail["detailcontent"]="";

        $res1=$this->db->query('select videolink from videoads where is_deleted="false"');


        if ($res1->num_rows())
        {
            $vidad=$res1->result();

            $k = array_rand($vidad);    

          
             $detail["videoad"]=$vidad[$k];
        }
        else
             $detail["videoad"]="";

         $res2=$this->db->query('select mem_id,imagelink,img_ad_id from imgads where is_deleted="false"');


        if ($res2->num_rows())
        {
            $imgad=$res2->result();

            $k = array_rand($imgad);    

          
             $detail["imgad"]=$imgad[$k];
        }
        else
             $detail["imgad"]="";


        return $detail;
    }


      public function getcategories()
    {
            $query=$this->db->query("select cat_id ,cat_name,imagelink from categories where is_deleted='false'");        
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }

     public function getservices($catid)
    {
        $query=$this->db->query('select ser_id,cat_id, service_name,iconlink as imagelink from services where cat_id='.$catid.'');        
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }
     public function getcontacts($ser_id,$taluka)
    {
        $this->db->select('mem_id,mem_name,business_name,address,mobile_no,imagelink');
        $this->db->from('members');
        $this->db->where('service_id',$ser_id);
        if($taluka!='all')
            $this->db->where('taluka',$taluka);
        $this->db->where('is_deleted',"false");
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }
     public function getdetailcontact($m_id)
    {    
         //$q=$this->db->query("update members set mobile_view=mobile_view+1 where mem_id=".$m_id."");

        $this->db->select('mem_id,mem_name,business_name,address,mobile_no,imagelink,landline_no,email_id,business_desc');
        $this->db->from('members');
        $this->db->where('mem_id',$m_id);
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }

    public function getsearchlist()
    {
  
        $contact=$this->db->query("select mem_id as id,mem_name as name,'contact' as type from members where is_deleted=false");

        if($contact->num_rows()>0)
        {

        
             $ids=array();
            $names=array();
            foreach ($contact->result() as $key => $value) {
            array_push($ids,$value->id);
            array_push($names,$value->name);
           // array_push($types,$value->type);
            }
            $all["ids"]=$ids;
            $all["names"]=$names;
         //   $all["types"]=$types;

            return $all;
        }
        else
            return false;
    }
    public function gettaluka()
    {
        $this->db->select('name');
        $this->db->from('taluka');
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result();
        else
            return false;

    }

   


   /* public function getcategories()
    {
        $query=$this->db->query("select * from categories");        
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }

    public function getservices($catid)
    {
        $query=$this->db->query("select * from services where cat_id=".$catid."");        
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }

    public function getcatid($ser_id)
    {
        $query=$this->db->query("select cat_id from services where ser_id=".$ser_id."");        
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }
    public function getcontacts($ser_id)
    {
        
        $this->db->select('mem_name,mem_id,business_name,address,mobile_no,imagelink');
        $this->db->from('members');
        $this->db->where('service_id',$ser_id);
        $this->db->where('is_active',1);
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }

    public function getdetailcontact($m_id)
    {    
         $q=$this->db->query("update members set mobile_view=mobile_view+1 where mem_id=".$m_id."");
        $this->db->select('*');
        $this->db->from('members');
        $this->db->where('mem_id',$m_id);
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result();
        else
            return false;
    }

    public function getads()
    {
        $query = $this->db->query("SELECT * FROM `ads` WHERE is_active=1");
        if($query->num_rows())
        {
             $res=$query->result();
            $ads=array();
            shuffle($res);
            if(sizeof($res)>=5)
                $n=5;
            else
                $n=sizeof($res);
            $ads=array_rand($res,$n);
            $ad=array();
            //echo is_array($ads);
            //print_r(is_array($ads));
            //exit();
            if(is_array($ads))
            {
                foreach ($ads as $key => $value) {
                array_push($ad,$res[$value]);
                }
            }else
            {
               array_push($ad,$res[0]); 
            }
            
            return $ad;
        }
        else
            return false;
    }

    public function getads1($catid)
    {
        $query = $this->db->query("SELECT * FROM `ads` WHERE is_active=1 AND mem_id IN(select `mem_id` FROM members WHERE `service_id` IN (SELECT `ser_id` FROM `services` WHERE `cat_id`=".$catid.") AND is_active =1)");
        if($query->num_rows())
        {
             $res=$query->result();
            $ads=array();
            shuffle($res);
            if(sizeof($res)>=5)
                $n=5;
            else
                $n=sizeof($res);
            $ads=array_rand($res,$n);
            $ad=array();
            if(is_array($ads)=="Array")
            {
                foreach ($ads as $key => $value) {
                array_push($ad,$res[$value]);
                }
            }else
            {
               array_push($ad,$res[0]); 
            }
            
            return $ad;
        }
        else
            return false;
    }
    public function getads2($mem_id)
    {
        $query = $this->db->query("SELECT * FROM `ads` WHERE is_active=1 AND mem_id =".$mem_id."");
        if($query->num_rows())
        {
            $res=$query->result();
            $ads=array();
            shuffle($res);
            if(sizeof($res)>=5)
                $n=5;
            else
                $n=sizeof($res);
            $ads=array_rand($res,$n);
            $ad=array();
            if(is_array($ads))
            {
                foreach ($ads as $key => $value) {
                array_push($ad,$res[$value]);
                }
            }else
            {
               array_push($ad,$res[0]); 
            }
            
            return $ad;
        }
        else
            return false;
    }

    public function countcall($m_id)
    {    
         $q=$this->db->query("update members set call_count=call_count+1 where mem_id=".$m_id."");
        return true;
    }

    public function getsearchlist()
    {
        $services=$this->db->query("select ser_id as id,service_name as name,'service' as type from services");
        $contact=$this->db->query("select mem_id as id,mem_name as name,'contact' as type from members where is_active=1");
        $business=$this->db->query("select mem_id as id,business_name as name,'contact' as type from members where is_active=1");
        $categories=$this->db->query("select cat_id as id,cat_name as name,'category' as type from categories");
        $res=array();
        if($categories->num_rows()>0)
        {
            $res=$categories->result();
            $res=array_merge($res,$services->result());
            $res=array_merge($res,$contact->result());
            $res=array_merge($res,$business->result());
            $all=array();
            $ids=array();
            $names=array();
            $types=array();
            foreach ($res as $key => $value) {
            array_push($ids,$value->id);
            array_push($names,$value->name);
            array_push($types,$value->type);
            }
            $all["ids"]=$ids;
            $all["names"]=$names;
            $all["types"]=$types;

            return $all;


        }
        else
            return false;
    }


     public function inccallcount($m_id)
    {
     $q=$this->db->query("update members set app_call_count=app_call_count+1 where mem_id=".$m_id."");
     return true;
    }*/


}