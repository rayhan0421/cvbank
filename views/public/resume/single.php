<?php
include ("../../../vendor/autoload.php");
session_start();
use App\admin\resume;
$resume= new resume();
$id='';
if(isset($_GET['id'])){
    $data['id'] = $_GET['id'];
    $id=$data['id'];

}else{

    $data['id'] = $_SESSION['userinfo'][0]['id'];
}

$print = null;
if(isset($_GET['print'])){
    $print = "print";
}

$resume->setdata($data);
$about = $resume->about();
$setting = $resume->settings();
$fullname= $setting['fullname'];
$address= $setting['address'];
$phone= $about['phone'];
$email= $about['umail'];
$career= $setting['description'];
$img= $setting['featured_img'];

$serv_trs= "";
$awd_trs= "";
$exp_trs= "";
$port_trs= "";
$skill_trs= "";
$edu_trs= "";

$education = $resume->education();
foreach ($education as $value):
    $edu_trs.="<tr>";
    $edu_trs.= "<td>".$value['title']."</td>";
    $edu_trs.= "<td>".$value['institute']."</td>";
    $edu_trs.= "<td>".$value['result']."</td>";
    $edu_trs.= "<td>".$value['passing_year']."</td>";
    $edu_trs.= "<td>".$value['main_subject']."</td>";
    $edu_trs.= "<td>".$value['education_board']."</td>";
    $edu_trs.= "<td>".$value['course_duration']."</td>";



    $edu_trs.="</tr>";
endforeach;

$skills = $resume->skill();


foreach ($skills as $value):
    $skill_trs.="<tr>";
    $skill_trs.= "<td>".$value['title']."</td>";
    $skill_trs.= "<td>".$value['description']."</td>";
    $skill_trs.= "<td>".$value['level']."</td>";
    $skill_trs.= "<td>".$value['experience']."</td>";
    $skill_trs.= "<td>".$value['experience_area']."</td>";




    $skill_trs.="</tr>";
endforeach;
$ports = $resume->portfolio();


foreach ($ports as $value):
    $port_trs.="<tr>";
    $port_trs.= "<td>".$value['title']."</td>";
    $port_trs.= "<td>".$value['description']."</td>";





    $port_trs.="</tr>";
endforeach;

$exp = $resume->experience();


foreach ($exp as $value):
    $exp_trs.="<tr>";

    $exp_trs.= "<td>".$value['designation']."</td>";
    $exp_trs.= "<td>".$value['company_name']."</td>";
    $exp_trs.= "<td>".$value['start_date']."</td>";
    $exp_trs.= "<td>".$value['end_date']."</td>";
    $exp_trs.= "<td>".$value['company_location']."</td>";




    $exp_trs.="</tr>";
endforeach;

$award = $resume->award();


foreach ($award as $value):
    $awd_trs.="<tr>";

    $awd_trs.= "<td>".$value['title']."</td>";
    $awd_trs.= "<td>".$value['organization']."</td>";
    $awd_trs.= "<td>".$value['description']."</td>";
    $awd_trs.= "<td>".$value['location']."</td>";
    $awd_trs.= "<td>".$value['year']."</td>";




    $awd_trs.="</tr>";
endforeach;

$serv = $resume->service();


foreach ($serv as $value):
    $serv_trs.="<tr>";

    $serv_trs.= "<td>".$value['title']."</td>";
    $serv_trs.= "<td>".$value['description']."</td>";


    $serv_trs.="</tr>";
endforeach;
?>





<?php
    $html = <<<EOD
    <html>
    <head>
       
         <link rel="stylesheet" type="text/css" href="../../../assets/public/resume/css/bootstrap.min.css" />
         <title>CVBANK</title>
         <style type="text/css" media="print">
         
         @page{
         size:auto;
          margin-top:60px;
         margin-bottom:10px;
         }
         .no-print{
         display:none!important; 
         }
         
         </style>
         
       <style type="text/css" media="screen">
         
         html{
         size:auto;
        margin-top:100px;
         }
         
         
         </style>
     

  

    </head>
    <body>
         <div class="container">
        <div class="row no-print" >
            <div class="col-lg-12" style="float:left">
            <center>
             <h1 > CV Bank Resume </h1> 

             
             
             
             
          <div class="no-print">
             <button onclick="window.open("Test.pdf")" class="btn">
              Print version
              </button>
             <button onclick="window.print()" class="btn">
              Print
              </button>
          
             <button>
             <a target="_blank" href="http://localhost/cvbank/views/public/resume/single.php?pdf=pdf&id=$id" >download pdf</a> 
             </button>
           </div>
         
             </div>
            </center>
            </div>
         </div>   
        
        </div>
        <div class="container">
        <div class="row">
             <div class="col-lg-10" >
             
                <img height="150"  width="150" src="http://localhost/cvbank/storage/images/$img" />
            </div>
            <div class="col-lg-2" align="right">
              
                <label>$fullname</label>
                 <br/>
                <label>Address: </label> <span>$address</span>
                <br/>
                <label>Mobile: </label> <span>$phone</span>
                <br/>
                <label>Email: </label> <span>$email</span>
                <br/>


            </div>
       
        </div>
        <hr/>

    </div> 
      <div class="container">
        <div class="row">
        <div class="col-lg-12">
        <h1 style="background-color:rgba(125,125,125,.1) "> Career Objective: </h1>
        <div>
          $career
        </div>
         </div>
     </div>
    </div>
      <div class="container">
        <div class="row">
        <div class="col-lg-12">
           <h1 style="background-color:rgba(125,125,125,.3) "> Education : </h1>
        <table class="table">
            <tr style="background-color:rgba(255,125,125,.2)">
                <td> title </td>
                <td> institute </td>
                <td> result </td>
                <td> passing_year </td>
                <td> main_subject </td>
                <td> education_board </td>  
                <td> course_duration </td>  
            </tr>
           $edu_trs
         </table>
          </div>
     </div>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
           <h1 style="background-color:rgba(125,125,125,.3) "> Specialization : </h1>
        <table class="table">
            <tr  style="background-color:rgba(255,125,125,.2)">
                <td> title </td>
                <td> description </td>
                <td> level </td>
                <td> experience </td>
                <td> experience_area </td>
               
            </tr>
           $skill_trs
         </table>
          </div>
     </div>
    </div>
        <div class="container">
        <div class="row">
        <div class="col-lg-12">
           <h1 style="background-color:rgba(125,125,125,.3) "> fortpolio : </h1>
        <table class="table">
            <tr style="background-color:rgba(255,125,125,.2)">
                <td> title </td>
                <td> description </td>
            
               
            </tr>
           $port_trs
         </table>
          </div>
     </div>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
           <h1 style="background-color:rgba(125,125,125,.3) "> Experience : </h1>
        <table class="table">
            <tr  style="background-color:rgba(255,125,125,.2)">
             
                <td> designation </td>
                <td> company_name </td>
                <td> start_date </td>
                <td> end_date </td>
                <td> company_location </td>
            
               
            </tr>
           $exp_trs
         </table>
          </div>
     </div>
    </div>
      <div class="container">
        <div class="row">
        <div class="col-lg-12">
           <h1 style="background-color:rgba(125,125,125,.3) "> Award : </h1>
        <table class="table">
         <tr  style="background-color:rgba(255,125,125,.2)">
                <td> title </td>
                <td> organization	 </td>
                <td> description </td>
             
                <td> location </td>
                <td> year </td>
               
            </tr>
           $awd_trs
         </table>
          </div>
     </div>
    </div>
         <div class="container">
        <div class="row">
        <div class="col-lg-12">
           <h1 style="background-color:rgba(125,125,125,.3) "> Service : </h1>
        <table class="table">
         <tr  style="background-color:rgba(255,125,125,.2)">
                <td> title </td>
                <td> description </td>
             
               
            </tr>
           $serv_trs
         </table>
          </div>
     </div>
    </div>
    </body>
    </html>

EOD;

?>






<?php

if(isset($_GET['pdf'])){
    $pdf_cv =  new mPDF();

    $pdf_cv->WriteHTML($html);
    $pdf_cv->Output();
}else{
    echo $html;
}

die();


?>


