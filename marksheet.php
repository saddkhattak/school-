<?php
         require_once("admin/inc/db.php");


         if(isset($_GET['std-name']) && isset($_GET['class']))
         {

        $std_name=$_GET['std-name'];
        $class=$_GET['class'];
         $qry="SELECT
    `register`.`r_id`
    , `register`.`name`
    , `register`.`fname`
    , `register`.`email`
    , `register`.`mobile_number`
    , `register`.`address`
    , `register`.`class_id`
    , `register`.`images`
    , `class`.`class`
    , `result`.`english`
    , `result`.`maths`
    , `result`.`urdu`
    , `result`.`islamiyat`
    , `result`.`pakstudy`
    , `result`.`computer_science`
    , `result`.`physics`
    , `result`.`chemistry`
    , `result`.`biology`
    , `result`.`total_marks`
FROM
    `sic`.`class`
    INNER JOIN `sic`.`register` 
        ON (`class`.`class_id` = `register`.`class_id`)
    INNER JOIN `sic`.`result` 
        ON (`register`.`r_id` = `result`.`std_id`)
WHERE (`register`.`name` ='$std_name'
    AND `class`.`class` ='$class')";

    $result=mysqli_query($conn,$qry) or die(mysqli_error($conn));
    $row=mysqli_fetch_assoc($result);

}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
    #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}


</style>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="images/logo1.jpeg" style="width:220px" ></a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="#">
                            Pardise Public School </a>
                        </h2>
                        <div>Sabir Abad Road Dabb (Karak)</div>
                        <div>(123) 456-789</div>
                        <div>email@gmail.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                       
                        <h2 class="to"><b>Name : </b><?php echo $row['name'];?></h2>
                        <div class="address"><b>Address : </b><a href="#"> <?php echo $row['address'];?></a></div>
                       <div class="email"><b> Email : </b>  <a href=""><?php echo $row['email'];?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Details Mark Sheet</h1>
                        <div class="date"><b>Class : </b> <a href="#"> <?php echo $row['class'];?></a></div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead >
                        <tr>
                            <th class="no">#</th>
                            <th class="text-left no">DESCRIPTION</th>
                            <th class="text-right no">Total Marks</th>
                            <th class="text-right no">Obtained Marks</th>
                            <th class="text-right no">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no">01</td>
                            <td class="text-left">
                            <h3>
                                English
                            </h3>
                            </td>
                            <td class="qty"><?php if($row['class']<=8){echo 100;} else{echo 75;}?></td>
                            <td class="qty"><?php echo $row['english'];?></td>
                            <td>
                                <?php if($row['class']<=7 && $row['english']>=50) {echo "You are Passed";}
                                
                                 else if($row['class']>=8 && $row['english']>=40)
                                {
                                    echo "You are Passed";
                                }
                                else{
                                    echo "You are Failed";
                                }
                                
                                
                                ?>
                            
                        </tr>
                        <tr>
                            <td class="no">02</td>
                            <td class="text-left"><h3>Maths</h3></td>
                           <td class="qty"><?php if($row['class']<=8){echo 100;} else{echo 75;}?></td>
                            
                            <td class="qty"><?php echo $row['maths'];?></td>
                            <td>  <?php if($row['class']<=7 && $row['maths']>=50) {echo "You are Passed";}
                                
                                 else if($row['class']>=8 && $row['maths']>=40)
                                {
                                    echo "You are Passed";
                                }
                                else{
                                    echo "You are Failed";
                                }
                                
                                  ?>
                            
                        </tr>
                        <tr>
                            <td class="no">03</td>
                            <td class="text-left"><h3>Urdu</h3></td>
                           <td class="qty"><?php if($row['class']<=8){echo 100;} else{echo 75;}?></td>
                            
                            <td class="qty"><?php echo $row['urdu'];?></td>
                            <td>   <?php if($row['class']<=7 && $row['urdu']>=50) {echo "You are Passed";}
                                
                                 else if($row['class']>=8 && $row['urdu']>=40)
                                {
                                    echo "You are Passed";
                                }
                                else{
                                    echo "You are Failed";
                                }
                                
                                  ?>
                            
                        </tr>
                        <tr>
                            <td class="no">04</td>
                            <td class="text-left"><h3>Islamiyat</h3></td>
                           <td class="qty"><?php if($row['class']<=8){echo 100;} else{echo 75;}?></td>
                            
                            <td class="qty"><?php echo $row['islamiyat'];?></td>
                            <td>  <?php if($row['class']<=7 && $row['islamiyat']>=50) {echo "You are Passed";}
                                
                                 else if($row['class']>=8 && $row['islamiyat']>=40)
                                {
                                    echo "You are Passed";
                                }
                                else{
                                    echo "You are Failed";
                                }
                                ?>
                            
                        </tr>
                         <tr>
                            <td class="no">05</td>
                            <td class="text-left"><h3>Pak Study</h3></td>
                           <td class="qty"><?php if($row['class']<=8){echo 100;} else{echo 75;}?></td>
                            <td class="qty"><?php echo $row['pakstudy'];?></td>
                             <td>  <?php if($row['class']<=7 && $row['pakstudy']>=50) {echo "You are Passed";}
                                
                                 else if($row['class']>=8 && $row['pakstudy']>=40)
                                {
                                    echo "You are Passed";
                                }
                                else{
                                    echo "You are Failed";
                                }
                                ?>
                            
                        </tr>
                         <tr>
                            <td class="no">06</td>
                            <td class="text-left"><h3>Computer Science</h3></td>
                           <td class="qty"><?php if($row['class']<=8){echo 100;} else{echo 75;}?></td>
                            
                            <td class="qty"><?php echo $row['computer_science'];?></td>
                             <td>  <?php if($row['class']<=7 && $row['computer_science']>=50) {echo "You are Passed";}
                                
                                 else if($row['class']>=8 && $row['computer_science']>=40)
                                {
                                    echo "You are Passed";
                                }
                                else{
                                    echo "You are Failed";
                                }                                ?>
                            
                        </tr>
                        
                        
                        
                         <tr>
                            <td class="no">07</td>
                            <td class="text-left"><h3>Chemisrty</h3></td>
                           <td class="qty"><?php if($row['class']<=8){echo 100;} else{echo 75;}?></td>
                            
                            <td class="qty"><?php echo $row['chemistry'];?></td>
                             <td>  <?php if($row['class']<=7 && $row['chemistry']>=50) {echo "You are Passed";}
                                
                                 else if($row['class']>=8 && $row['chemistrys']>=40)
                                {
                                    echo "You are Passed";
                                }
                                else{
                                    echo "You are Failed";
                                } ?>
                            
                        </tr>
                        
                        
                        
                        
                         <tr>
                            <td class="no">08</td>
                            <td class="text-left"><h3>Physics</h3></td>
                           <td class="qty"><?php if($row['class']<=8){echo 100;} else{echo 75;}?></td>
                            
                            <td class="qty"><?php echo $row['physics'];?></td>
                             <td>  <?php if($row['class']<=7 && $row['physics']>=50) {echo "You are Passed";}
                                
                                 else if($row['class']>=8 && $row['physics']>=40)
                                {
                                    echo "You are Passed";
                                }
                                else{
                                    echo "You are Failed";
                                } ?>
                            
                        </tr>
                        
                        
                        
                         <tr>
                            <td class="no">09</td>
                            <td class="text-left"><h3>Biology</h3></td>
                           <td class="qty"><?php if($row['class']<=8){echo 100;} else{echo 75;}?></td>
                            
                            <td class="qty"><?php echo $row['biology'];?></td>
                             <td> <?php if($row['class']<=7 && $row['biology']>=50) {echo "You are Passed";}
                                
                                 else if($row['class']>=8 && $row['biology']>=40)
                                {
                                    echo "You are Passed";
                                }
                                else{
                                    echo "You are Failed";
                                } ?>
                            
                        </tr>
                        
                        
                        
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Total Obtained Marks</td>
                            <td><?php
                                    echo $ob_marks=$row['english']+$row['maths']+$row['urdu']+$row['islamiyat']+$row['pakstudy']+$row['computer_science']+$row['physics']+$row['chemistry']+$row['biology']   ; 

                            ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Total Marks</td>
                            <td><?php echo $row['total_marks'];?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Percentage</td>
                            <td><?php
                                    echo $Percentage=$ob_marks/600*100;

                                ?></td>
                        </tr>
                        
                    </tfoot>
                </table>
                
            </main>
            <hr>
    </div>
</div>

<script type="text/javascript">
     $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });

</script>