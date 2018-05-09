<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/9
 * Time: 15:23
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require ('vendor/autoload.php');

class newPDF{
    public function generate($salename = 'Jipeng Sun',$payname = 'Zheng Lyu',$sname = "PHP programming Service",$stype = "Coding",$price = 700){
        //include_once ('pdf-invoice/src/InvoicePrinter.php');
        $invoice = new \Konekt\PdfInvoice\InvoicePrinter();
        $invoice->setLogo('img/SRZK.png');
        $invoice->setColor('#007fff');
        $invoice->setType("SkillSpot Sale Invoice");    // Invoice Type
        $invoice->setReference("INV-55033645");   // Reference
        $invoice->setDate(date('M dS ,Y',time()));   //Billing Date
        $invoice->setTime(date('h:i:s A',time()));   //Billing Time
        $invoice->setDue(date('M dS ,Y',strtotime('+3 months')));    // Due Date
        $a = array("Seller Name",$salename);
        $invoice->setFrom($a);
        $b = array("Purchaser Name",$payname);
        $invoice->setTo($b);

        $invoice->addItem($sname,$stype,1,0,$price,0,$price);
       // $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
       // $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
       // $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);

        $invoice->addTotal("Total",$price);
        //$invoice->addTotal("VAT 21%",1986.6);
        //$invoice->addTotal("Total due",11446.6,true);

        $invoice->addBadge("Payment Paid");

        $invoice->addTitle("Important Notice");

        $invoice->addParagraph("You can't get refund of your service if you don't have this invoice with you.");

        $invoice->setFooternote("SkillSpot");

        $invoice->render('example1.pdf','I');
        /* I => Display on browser, D => Force Download, F => local path save, S => return document path */




}
}